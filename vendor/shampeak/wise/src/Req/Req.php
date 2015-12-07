<?php

namespace Sham\Req;

use Sham\Set\Base;

class Req extends Base
{

      /*
      |--------------------------------------------------------------------------
      | request 获取
      |--------------------------------------------------------------------------
      |
      |
      */
      private $_config  = array();
      // *-----------------------------------------------------------------
      public function __construct($config = array()){
            $this->_config = $config;
      }

      public function __get($key='')
      {
            switch($key){
                  case 'get':
                        return $_GET;
                        break;
                  case 'post':
                        return $_POST;
                        break;
                  case 'cookie':
                        return $_COOKIE;
                        break;
                  case 'session':
                        return $_SESSION;
                        break;
                  case 'router':
                        return $_SESSION;
                        break;
            }
      }


      //=======================================

      public function demo()
      {
            /**
             *    获得对get post cookie file session 的支持
             */
      }

}
