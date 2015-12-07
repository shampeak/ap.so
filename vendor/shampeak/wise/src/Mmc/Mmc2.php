<?php

namespace Sham\Mmc;



class Mmc{

      private $memcache = null;
      private $_config  = array();

      public function __construct(){
      }

      /**
      * �������ݿ�
      *
      * @param mixed $host
      * @param mixed $port
      * @param mixed $timeout
      */
      public  function connect($config = array()){
            if(!function_exists(memcache_connect)) return FALSE;
            $this->_config = $config;
            $this->memcache = @memcache_connect($config['Memcache_host'],$config['Memcache_port'],$config['Memcache_timeout']);
            if(!$this->memcache){
                  die('memcache died');
            }else{
            }
      }

      /**
      * ���ֵ
      *
      * @param mixed $key
      * @param mixed $var
      * @param mixed $flag   Ĭ��Ϊ0��ѹ��  ѹ��״̬��д��MEMCACHE_COMPRESSED
      * @param mixed $expire  Ĭ�ϻ���ʱ��(��λ��)
      */
      public function set($key,$var,$flag=0,$expire=10){

            $f = @memcache_set($this->memcache,$key,$var,$flag,$expire);

            if(empty($f)){
                  die('memcache set error');
            }else{
                  return TRUE;
            }
      }

      /**
      * ȡ����Ӧ��key��value
      *
      * @param mixed $key
      * @param mixed $flags
      * $flags �����ֵΪ1��ʾ�������л���
      * ��δ����ѹ����2����ѹ����δ���л���
      * 3����ѹ���������л���0����δ����ѹ�������л�
      */
      public function get($key,$flags=0){
            $val=@memcache_get($this->memcache,$key,$flags);
            return $val;
      }

      /**
      * ɾ�������key
      *
      * @param mixed $key
      * @param mixed $timeout
      */
      public function delete($key,$timeout=1){
            $flag=@memcache_delete($this->memcache,$key,$timeout);
            return $flag;
      }

      /**
      * ˢ�»��浫���ͷ��ڴ�ռ�
      *
      */
      public function flush(){
            memcache_flush($this->memcache);
      }

      /**
      * �ر��ڴ�����
      *
      */
      public function close(){
            memcache_close($this->memcache);
      }

      /**
      * �滻��Ӧkey��value
      *
      * @param mixed $key
      * @param mixed $var
      * @param mixed $flag
      * @param mixed $expire
      */
      public function replace($key,$var,$flag=0,$expire=1){
            $f=memcache_replace($this->memcache,$key,$var,$flag,$expire);
            return $f;
      }

      /**
      * ������ֵ�Զ�ѹ��
      *
      * @param mixed $threshold ��λb
      * @param mixed $min_saveings Ĭ��ֵ��0.2��ʾ20%ѹ����
      */
      public function setCompressThreshold($threshold,$min_saveings=0.2){
            $f=@memcache_set_compress_threshold($this->memcache,$threshold,$min_saveings);
            return $f;
      }

      /**
      * ���ڻ�ȡһ��������������/����״̬
      *
      * @param mixed $host
      * @param mixed $port
      */
      public function getServerStatus($host,$port=11211){
            $re=memcache_get_server_status($this->memcache,$host,$port);
            return $re;
      }

      /**
      * ����������������з�����ͳ����Ϣ
      *
      * @param mixed $type ����ץȡ��ͳ����Ϣ���ͣ�����ʹ�õ�ֵ��{reset, malloc, maps, cachedump, slabs, items, sizes}
      * @param mixed $slabid  cachedump�������ȫռ�÷�����ͨ������ �Ƚ��ϸ�ĵ�
      * @param mixed $limit �ӷ���˻�ȡ��ʵ������
      */
      public function getExtendedStats($type='',$slabid=0,$limit=100){
            $re=memcache_get_extended_stats($this->memcache,$type,$slabid,$limit);
            return $re;
      }

      public function demo(){
            echo '$md = sapp(\'Memcache\')->demo();;';

      }



}


/***********��������*******************
$mem=new Yc_Memcache();

$f=$mem->connect('125.64.41.138',12000);
var_dump($f);
if($f){
// $mem->setCompressThreshold(2000,0.2);
$mem->set('key','hello',0,30);
//        var_dump($mem->delete('key1'));
// $mem->flush();
// var_dump($mem->replace('hao','d'));
// echo $mem->get('key');
echo $mem->getServerStatus('127.0.0.1',12000);
echo $mem->get('key');
echo '<pre>';
 print_r($mem->getExtendedStats());
}
 */
