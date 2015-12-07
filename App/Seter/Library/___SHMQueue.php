<?php
/**
 * ʹ�ù����ڴ��PHPѭ���ڴ����ʵ��
 * ֧�ֶ����, ֧�ָ����������͵Ĵ洢
 * ע: �����ӻ���Ӳ���,����ʹ��unset(), ���ͷ��ٽ���
 * @author wangbinandi@gmail.com
 * @created 2009-12-23
 *
 *
 * �����û�������֤,����!,�и����ӵ������û����֤;
 */
class SHMQueue
{
      private $maxQSize = 0; // ������󳤶�

      private $front = 0; // ��ͷָ��
      private $rear = 0;  // ��βָ��

      private $blockSize = 256;  // ��Ĵ�С(byte)
      private $memSize = 25600;  // ������ڴ�(byte)
      private $shmId = 0;

      private $filePtr = './shmq.ptr';

      private $semId = 0;
      public function __construct()
      {
            $shmkey = ftok(__FILE__, 't');

            $this->shmId = shmop_open($shmkey, "c", 0644, $this->memSize );
            $this->maxQSize = $this->memSize / $this->blockSize;

            // ��Ոһ���ź���
            $this->semId = sem_get($shmkey, 1);
            sem_acquire($this->semId); // ��������ٽ���

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
            if ( $this->ptrInc($this->rear) == $this->front ){ // ����
                  return false;
            }

            $data = $this->encode($value);
            shmop_write($this->shmId, $data, $this->rear );
            $this->rear = $this->ptrInc($this->rear);
            return true;
      }

      public function deQueue()
      {
            if ( $this->front == $this->rear ){ // �ӿ�
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

            sem_release($this->semId); // ���ٽ���, �ͷ��ź���
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
     * ��̨�ű�������
     */
    class DaemonCommand{

          private $info_dir="/tmp";
          private $pid_file="";
          private $terminate=false; //�Ƿ��ж�
          private $workers_count=0;
          private $gc_enabled=null;
          private $workers_max=8; //�������8������

          public function __construct($is_sington=false,$user='nobody',$output="/dev/null"){

                $this->is_sington=$is_sington; //�Ƿ������У��������л���tmpĿ¼�½���һ��Ψһ��PID
                $this->user=$user;//�������е��û� Ĭ�������nobody
                $this->output=$output; //��������ĵط�
                $this->checkPcntl();
          }
          //��黷���Ƿ�֧��pcntl֧��
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
                //�źŴ���
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

          // daemon������
          public function daemonize(){

                global $stdin, $stdout, $stderr;
                global $argv;

                set_time_limit(0);

                // ֻ������cli��������
                if (php_sapi_name() != "cli"){
                      die("only run in command line mode\n");
                }

                // ֻ�ܵ�������
                if ($this->is_sington==true){

                      $this->pid_file = $this->info_dir . "/" .__CLASS__ . "_" . substr(basename($argv[0]), 0, -4) . ".pid";
                      $this->checkPidfile();
                }

                umask(0); //���ļ�������0

                if (pcntl_fork() != 0){ //�Ǹ����̣��������˳�
                      exit();
                }

                posix_setsid();//�����»Ự�鳤�������ն�

                if (pcntl_fork() != 0){ //�ǵ�һ�ӽ��̣�������һ�ӽ���
                      exit();
                }

                chdir("/"); //�ı乤��Ŀ¼

                $this->setUser($this->user) or die("cannot change owner");

                //�رմ򿪵��ļ�������
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
          //--���pid�Ƿ��Ѿ�����
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
          //----����pid
          public function createPidfile(){

                if (!is_dir($this->info_dir)){
                      mkdir($this->info_dir);
                }
                $fp = fopen($this->pid_file, 'w') or die("cannot create pid file");
                fwrite($fp, posix_getpid());
                fclose($fp);
                $this->_log("create pid file " . $this->pid_file);
          }

          //�������е��û�
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
          //�źŴ�����
          public function signalHandler($signo){

                switch($signo){

                      //�û��Զ����ź�
                      case SIGUSR1: //busy
                            if ($this->workers_count < $this->workers_max){
                                  $pid = pcntl_fork();
                                  if ($pid > 0){
                                        $this->workers_count ++;
                                  }
                            }
                            break;
                      //�ӽ��̽����ź�
                      case SIGCHLD:
                            while(($pid=pcntl_waitpid(-1, $status, WNOHANG)) > 0){
                                  $this->workers_count --;
                            }
                            break;
                      //�жϽ���
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
           *��ʼ��������
           *$count ׼�������Ľ�����
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

                            // ������ű�ʾ�ָ�ϵͳ���źŵ�Ĭ�ϴ���
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

          //���������˳�
          public function mainQuit(){

                if (file_exists($this->pid_file)){
                      unlink($this->pid_file);
                      $this->_log("delete pid file " . $this->pid_file);
                }
                $this->_log("daemon process exit now");
                posix_kill(0, SIGKILL);
                exit(0);
          }

          // ��ӹ���ʵ����Ŀǰֻ֧�ֵ���job����
          public function setJobs($jobs=array()){

                if(!isset($jobs['argv'])||empty($jobs['argv'])){

                      $jobs['argv']="";

                }
                if(!isset($jobs['runtime'])||empty($jobs['runtime'])){

                      $jobs['runtime']=1;

                }

                if(!isset($jobs['function'])||empty($jobs['function'])){

                      $this->log("�����������еĺ�����");
                }

                $this->jobs=$jobs;

          }
          //��־����
          private  function _log($message){
                printf("%s\t%d\t%d\t%s\n", date("c"), posix_getpid(), posix_getppid(), $message);
          }

    }

    //���÷���1
    $daemon=new DaemonCommand(true);
    $daemon->daemonize();
    $daemon->start(2);//����2���ӽ��̹���
    work();




    //���÷���2
    $daemon=new DaemonCommand(true);
    $daemon->daemonize();
    $daemon->addJobs(array('function'=>'work','argv'=>'','runtime'=>1000));//function Ҫ���еĺ���,argv���к����Ĳ�����runtime���еĴ���
    $daemon->start(2);//����2���ӽ��̹���

    //���幦�ܵ�ʵ��
    function work(){
          echo "����1";
    }



