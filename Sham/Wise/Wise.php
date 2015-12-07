<?php

namespace Sham\Wise;

use Sham\Set\Set;
/**
 * Class wise
 * @package Sham\wise
 */

class Wise extends Set
{
      /**
       * @var null
       * wise单例调用
       */
      private static $_instance = null;       //单例调用
      public $_config  = array();              //C函数的存储     //所有的配置信息存储在这里
      private $rootpath = '../App/Config/';     //配置文件的根目录

      /**
       * @param string $conf
       * 根据配置获取设定
       */
      private function __construct(){
            $this->_config = $this->load($this->rootpath."Config.php");
      }

      /**
       * @param $conf
       * @return wise|null
       * 单例调用
       */
      public static function getInstance(){
            if(!(self::$_instance instanceof self)){
                  self::$_instance = new self();
            }
            return self::$_instance;
      }

      /**
       * Ensure a value or object will remain globally unique
       * @param  string  $key   The value or object name
       * @param  Closure        The closure that defines the object
       * @return mixed
       */
      public function singleton($key, $value)
      {

            $this->set($key, function ($c) use ($value) {
                  static $object;
                  if (null === $object) {
                        $object = $value($c);
                  }
                  return $object;
            });
      }

      /**
       * @param $key
       * @return null
       * 调用其中的数据
       */
      function __invoke($key) {
            //设置一个值
            if(is_string($key)){
                  return $this->_config[$key];
            }else{
                  return null;
            }
      }

}
