<?php
/**
 * 使用共享内存的PHP循环内存队列实现
 * 支持多进程, 支持各种数据类型的存储
 * 注: 完成入队或出队操作,尽快使用unset(), 以释放临界区
 * @author wangbinandi@gmail.com
 * @created 2009-12-23
 *
 *
 * 这个并没有完成验证,慎用!,有更复杂的情况并没有验证;
 */
class SHMQueue
{
      private $maxQSize = 0; // 队列最大长度

      private $front = 0; // 队头指针
      private $rear = 0;  // 队尾指针

      private $blockSize = 256;  // 块的大小(byte)
      private $memSize = 25600;  // 最大共享内存(byte)
      private $shmId = 0;

      private $filePtr = './shmq.ptr';

      private $semId = 0;
      public function __construct()
      {
            $shmkey = ftok(__FILE__, 't');

            $this->shmId = shmop_open($shmkey, "c", 0644, $this->memSize );
            $this->maxQSize = $this->memSize / $this->blockSize;

            // 申請一个信号量
            $this->semId = sem_get($shmkey, 1);
            sem_acquire($this->semId); // 申请进入临界区

            $this->init();
      }

      private function init()
      {
            if ( file_exists($this->filePtr) ){
                  $contents = file_get_contents($this->filePtr);
                  $data = explode( '|', $contents );
                  if ( isset($data[0]) && isset($data[1])){
                        $this->front = (int)$data[0];
                        $this->rear  = (int)$data[1];
                  }
            }
      }

      public function getLength()
      {
            return (($this->rear - $this->front + $this->memSize) % ($this->memSize) )/$this->blockSize;
      }

      public function enQueue( $value )
      {
            if ( $this->ptrInc($this->rear) == $this->front ){ // 队满
                  return false;
            }

            $data = $this->encode($value);
            shmop_write($this->shmId, $data, $this->rear );
            $this->rear = $this->ptrInc($this->rear);
            return true;
      }

      public function deQueue()
      {
            if ( $this->front == $this->rear ){ // 队空
                  return false;
            }
            $value = shmop_read($this->shmId, $this->front, $this->blockSize-1);
            $this->front = $this->ptrInc($this->front);
            return $this->decode($value);
      }

      private function ptrInc( $ptr )
      {
            return ($ptr + $this->blockSize) % ($this->memSize);
      }

      private function encode( $value )
      {
            $data = serialize($value) . "__eof";
            if ( strlen($data) > $this->blockSize -1 ){
                  throw new Exception(strlen($data)." is overload block size!");
            }
            return $data;
      }

      private function decode( $value )
      {
            $data = explode("__eof", $value);
            return unserialize($data[0]);
      }

      public function __destruct()
      {
            $data = $this->front . '|' . $this->rear;
            file_put_contents($this->filePtr, $data);

            sem_release($this->semId); // 出临界区, 释放信号量
      }
}




































class Memcache_Queue
{
      private $memcache;
      private $name;
      private $prefix;
      function __construct($maxSize, $name, $memcache, $prefix = "__memcache_queue__")
      {
            if ($memcache == null) {
                  throw new Exception("memcache object is null, new the object first.");
            }
            $this->memcache = $memcache;
            $this->name = $name;
            $this->prefix = $prefix;
            $this->maxSize = $maxSize;
            $this->front = 0;
            $this->real = 0;
            $this->size = 0;
      }
      function __get($name)
      {
            return $this->get($name);
      }
      function __set($name, $value)
      {
            $this->add($name, $value);
            return $this;
      }
      function isEmpty()
      {
            return $this->size == 0;
      }
      function isFull()
      {
            return $this->size == $this->maxSize;
      }
      function enQueue($data)
      {
            if ($this->isFull()) {
                  throw new Exception("Queue is Full");
            }
            $this->increment("size");
            $this->set($this->real, $data);
            $this->set("real", ($this->real + 1) % $this->maxSize);
            return $this;
      }
      function deQueue()
      {
            if ($this->isEmpty()) {
                  throw new Exception("Queue is Empty");
            }
            $this->decrement("size");
            $this->delete($this->front);
            $this->set("front", ($this->front + 1) % $this->maxSize);
            return $this;
      }
      function getTop()
      {
            return $this->get($this->front);
      }
      function getAll()
      {
            return $this->getPage();
      }
      function getPage($offset = 0, $limit = 0)
      {
            if ($this->isEmpty() || $this->size < $offset) {
                  return null;
            }
            $keys[] = $this->getKeyByPos(($this->front + $offset) % $this->maxSize);
            $num = 1;
            for ($pos = ($this->front + $offset + 1) % $this->maxSize; $pos != $this->real; $pos = ($pos + 1) % $this->maxSize)
            {
                  $keys[] = $this->getKeyByPos($pos);
                  $num++;
                  if ($limit > 0 && $limit == $num) {
                        break;
                  }
            }
            return array_values($this->memcache->get($keys));
      }
      function makeEmpty()
      {
            $keys = $this->getAllKeys();
            foreach ($keys as $value) {
                  $this->delete($value);
            }
            $this->delete("real");
            $this->delete("front");
            $this->delete("size");
            $this->delete("maxSize");
      }
      private function getAllKeys()
      {
            if ($this->isEmpty())
            {
                  return array();
            }
            $keys[] = $this->getKeyByPos($this->front);
            for ($pos = ($this->front + 1) % $this->maxSize; $pos != $this->real; $pos = ($pos + 1) % $this->maxSize)
            {
                  $keys[] = $this->getKeyByPos($pos);
            }
            return $keys;
      }
      private function add($pos, $data)
      {
            $this->memcache->add($this->getKeyByPos($pos), $data);
            return $this;
      }
      private function increment($pos)
      {
            return $this->memcache->increment($this->getKeyByPos($pos));
      }
      private function decrement($pos)
      {
            $this->memcache->decrement($this->getKeyByPos($pos));
      }
      private function set($pos, $data)
      {
            $this->memcache->set($this->getKeyByPos($pos), $data);
            return $this;
      }
      private function get($pos)
      {
            return $this->memcache->get($this->getKeyByPos($pos));
      }
      private function delete($pos)
      {
            return $this->memcache->delete($this->getKeyByPos($pos));
      }
      private function getKeyByPos($pos)
      {
            return $this->prefix . $this->name . $pos;
      }
}



































    /**
     *@author tengzhaorong@gmail.com
     *@date 2013-07-25
     * 后台脚本控制类
     */
    class DaemonCommand{

          private $info_dir="/tmp";
          private $pid_file="";
          private $terminate=false; //是否中断
          private $workers_count=0;
          private $gc_enabled=null;
          private $workers_max=8; //最多运行8个进程

          public function __construct($is_sington=false,$user='nobody',$output="/dev/null"){

                $this->is_sington=$is_sington; //是否单例运行，单例运行会在tmp目录下建立一个唯一的PID
                $this->user=$user;//设置运行的用户 默认情况下nobody
                $this->output=$output; //设置输出的地方
                $this->checkPcntl();
          }
          //检查环境是否支持pcntl支持
          public function checkPcntl(){
                if ( ! function_exists('pcntl_signal_dispatch')) {
                      // PHP < 5.3 uses ticks to handle signals instead of pcntl_signal_dispatch
                      // call sighandler only every 10 ticks
                      declare(ticks = 10);
                }

                // Make sure PHP has support for pcntl
                if ( ! function_exists('pcntl_signal')) {
                      $message = 'PHP does not appear to be compiled with the PCNTL extension.  This is neccesary for daemonization';
                      $this->_log($message);
                      throw new Exception($message);
                }
                //信号处理
                pcntl_signal(SIGTERM, array(__CLASS__, "signalHandler"),false);
                pcntl_signal(SIGINT, array(__CLASS__, "signalHandler"),false);
                pcntl_signal(SIGQUIT, array(__CLASS__, "signalHandler"),false);

                // Enable PHP 5.3 garbage collection
                if (function_exists('gc_enable'))
                {
                      gc_enable();
                      $this->gc_enabled = gc_enabled();
                }
          }

          // daemon化程序
          public function daemonize(){

                global $stdin, $stdout, $stderr;
                global $argv;

                set_time_limit(0);

                // 只允许在cli下面运行
                if (php_sapi_name() != "cli"){
                      die("only run in command line mode\n");
                }

                // 只能单例运行
                if ($this->is_sington==true){

                      $this->pid_file = $this->info_dir . "/" .__CLASS__ . "_" . substr(basename($argv[0]), 0, -4) . ".pid";
                      $this->checkPidfile();
                }

                umask(0); //把文件掩码清0

                if (pcntl_fork() != 0){ //是父进程，父进程退出
                      exit();
                }

                posix_setsid();//设置新会话组长，脱离终端

                if (pcntl_fork() != 0){ //是第一子进程，结束第一子进程
                      exit();
                }

                chdir("/"); //改变工作目录

                $this->setUser($this->user) or die("cannot change owner");

                //关闭打开的文件描述符
                fclose(STDIN);
                fclose(STDOUT);
                fclose(STDERR);

                $stdin  = fopen($this->output, 'r');
                $stdout = fopen($this->output, 'a');
                $stderr = fopen($this->output, 'a');

                if ($this->is_sington==true){
                      $this->createPidfile();
                }

          }
          //--检测pid是否已经存在
          public function checkPidfile(){

                if (!file_exists($this->pid_file)){
                      return true;
                }
                $pid = file_get_contents($this->pid_file);
                $pid = intval($pid);
                if ($pid > 0 && posix_kill($pid, 0)){
                      $this->_log("the daemon process is already started");
                }
                else {
                      $this->_log("the daemon proces end abnormally, please check pidfile " . $this->pid_file);
                }
                exit(1);

          }
          //----创建pid
          public function createPidfile(){

                if (!is_dir($this->info_dir)){
                      mkdir($this->info_dir);
                }
                $fp = fopen($this->pid_file, 'w') or die("cannot create pid file");
                fwrite($fp, posix_getpid());
                fclose($fp);
                $this->_log("create pid file " . $this->pid_file);
          }

          //设置运行的用户
          public function setUser($name){

                $result = false;
                if (empty($name)){
                      return true;
                }
                $user = posix_getpwnam($name);
                if ($user) {
                      $uid = $user['uid'];
                      $gid = $user['gid'];
                      $result = posix_setuid($uid);
                      posix_setgid($gid);
                }
                return $result;

          }
          //信号处理函数
          public function signalHandler($signo){

                switch($signo){

                      //用户自定义信号
                      case SIGUSR1: //busy
                            if ($this->workers_count < $this->workers_max){
                                  $pid = pcntl_fork();
                                  if ($pid > 0){
                                        $this->workers_count ++;
                                  }
                            }
                            break;
                      //子进程结束信号
                      case SIGCHLD:
                            while(($pid=pcntl_waitpid(-1, $status, WNOHANG)) > 0){
                                  $this->workers_count --;
                            }
                            break;
                      //中断进程
                      case SIGTERM:
                      case SIGHUP:
                      case SIGQUIT:

                            $this->terminate = true;
                            break;
                      default:
                            return false;
                }

          }
          /**
           *开始开启进程
           *$count 准备开启的进程数
           */
          public function start($count=1){

                $this->_log("daemon process is running now");
                pcntl_signal(SIGCHLD, array(__CLASS__, "signalHandler"),false); // if worker die, minus children num
                while (true) {
                      if (function_exists('pcntl_signal_dispatch')){

                            pcntl_signal_dispatch();
                      }

                      if ($this->terminate){
                            break;
                      }
                      $pid=-1;
                      if($this->workers_count<$count){

                            $pid=pcntl_fork();
                      }

                      if($pid>0){

                            $this->workers_count++;

                      }elseif($pid==0){

                            // 这个符号表示恢复系统对信号的默认处理
                            pcntl_signal(SIGTERM, SIG_DFL);
                            pcntl_signal(SIGCHLD, SIG_DFL);
                            if(!empty($this->jobs)){
                                  while($this->jobs['runtime']){
                                        if(empty($this->jobs['argv'])){
                                              call_user_func($this->jobs['function'],$this->jobs['argv']);
                                        }else{
                                              call_user_func($this->jobs['function']);
                                        }
                                        $this->jobs['runtime']--;
                                        sleep(2);
                                  }
                                  exit();

                            }
                            return;

                      }else{

                            sleep(2);
                      }


                }

                $this->mainQuit();
                exit(0);

          }

          //整个进程退出
          public function mainQuit(){

                if (file_exists($this->pid_file)){
                      unlink($this->pid_file);
                      $this->_log("delete pid file " . $this->pid_file);
                }
                $this->_log("daemon process exit now");
                posix_kill(0, SIGKILL);
                exit(0);
          }

          // 添加工作实例，目前只支持单个job工作
          public function setJobs($jobs=array()){

                if(!isset($jobs['argv'])||empty($jobs['argv'])){

                      $jobs['argv']="";

                }
                if(!isset($jobs['runtime'])||empty($jobs['runtime'])){

                      $jobs['runtime']=1;

                }

                if(!isset($jobs['function'])||empty($jobs['function'])){

                      $this->log("你必须添加运行的函数！");
                }

                $this->jobs=$jobs;

          }
          //日志处理
          private  function _log($message){
                printf("%s\t%d\t%d\t%s\n", date("c"), posix_getpid(), posix_getppid(), $message);
          }

    }

    //调用方法1
    $daemon=new DaemonCommand(true);
    $daemon->daemonize();
    $daemon->start(2);//开启2个子进程工作
    work();




    //调用方法2
    $daemon=new DaemonCommand(true);
    $daemon->daemonize();
    $daemon->addJobs(array('function'=>'work','argv'=>'','runtime'=>1000));//function 要运行的函数,argv运行函数的参数，runtime运行的次数
    $daemon->start(2);//开启2个子进程工作

    //具体功能的实现
    function work(){
          echo "测试1";
    }



