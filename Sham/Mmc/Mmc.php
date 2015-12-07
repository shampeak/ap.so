<?php

namespace Sham\Mmc;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/4 0004
 * Time: 16:37
 */

class Mmc {


      public      $group      = '';
      private     $mmc        = NULL;
      private     $ver        = 0;
      private     $_config    = array();

      public function __construct($memConfig = array()) {
            $this->_config = $memConfig;
            if(!$this->_config['MEM_ENABLE']) return null;
            // | ------------------------------------------------------
            $this->mmc = new \Memcache;
            if(empty($memConfig)) {
                  $memConfig['MEM_SERVER'] = [
                      ['127.0.0.1', 11211]
                  ];
                  $memConfig['MEM_GROUP'] = 'tag';
            }

            //ʵ��addServer����
            foreach($memConfig['MEM_SERVER'] as $config) {
                  /*
                  *�Ƚ�$memConfig['MEM_SERVER']�еķ�������Ϣ������������������Ϣ�������ļ������ã�
                  ����array('127.0.0.1', 11211)��	array('127.0.0.2', 11211)....
                  *�������ͣ�Ȼ�����call_user_func_array()�������ú���������,��һ������˵����
                  *��array('127.0.0.1', 11211)ʱ����call_user_func_array(array($this->mmc, 'addServer'), $config);ʱ�����Ϊ
                  *$this->mmc->addServer('127.0.0.1',11211),��Ϊcall_user_func_array����Ҳ���Ե������ڲ��ķ�����,$config�е�Ԫ�أ���Ӧ
                  *��ΪaddServer�����Ĳ���
                  */
                  call_user_func_array(array($this->mmc, 'addServer'), $config);
            }
            $this->group = $memConfig['MEM_GROUP'];
            $this->ver = intval( $this->mmc->get($this->group.'_ver') );
      }

      //���memcache�İ汾��Ϣ
      public function version(){
            if(!$this->_config['MEM_ENABLE']) return null;
            // | ------------------------------------------------------
            return $this->mmc->getVersion();
      }

      //��ȡ����
      public function get($key) {
            if(!$this->_config['MEM_ENABLE']) return null;
            // | ------------------------------------------------------
            return $this->mmc->get($this->group.'_'.$this->ver.'_'.$key);
      }

      //���û���
      public function set($key,$value,$expire = 1800) {
            if(!$this->_config['MEM_ENABLE']) return null;
            // | ------------------------------------------------------
            return $this->mmc->set($this->group.'_'.$this->ver.'_'.$key, $value, 0,$expire);
      }

      //��ӻ���
      public function add($key, $value, $expire = 1800) {
            if(!$this->_config['MEM_ENABLE']) return null;
            // | ------------------------------------------------------
            if(!$this->get($key)){
                  return $this->mmc->add($this->group.'_'.$this->ver.'_'.$key, $value,0,$expire);
            }else{
                  echo "����ʧ�ܣ��ü�ֵ���ѱ�ע��";
                  return false;
            }
      }

      //�滻����
      public function replace($key, $value, $expire = 1800){
            if(!$this->_config['MEM_ENABLE']) return null;
            // | ------------------------------------------------------
            return $this->mmc->replace($this->group.'_'.$this->ver."_".$key,0, $value);
      }

      //����1
      public function inc($key, $value = 1) {
            if(!$this->_config['MEM_ENABLE']) return null;
            // | ------------------------------------------------------
            return $this->mmc->increment($this->group.'_'.$this->ver.'_'.$key, $value);
      }

      //�Լ�1
      public function des($key, $value = 1) {
            if(!$this->_config['MEM_ENABLE']) return null;
            // | ------------------------------------------------------
            return $this->mmc->decrement($this->group.'_'.$this->ver.'_'.$key, $value);
      }

      //ɾ��
      public function del($key) {
            if(!$this->_config['MEM_ENABLE']) return null;
            // | ------------------------------------------------------
            return $this->mmc->delete($this->group.'_'.$this->ver.'_'.$key);
      }

      //ȫ�����
      public function clear() {
            if(!$this->_config['MEM_ENABLE']) return null;
            // | ------------------------------------------------------
            $this->ver = $this->ver + 1;
            return  $this->mmc->set($this->group.'_ver', $this->ver);
      }

      //�رջ���
      public function close() {
            if(!$this->_config['MEM_ENABLE']) return null;
            // | ------------------------------------------------------
            return $this->mmc->close();
      }



}


