<?php

namespace Sham\Bus;

use Sham\Set\Base;

    /*
    |--------------------------------------------------------------------------
    | 信息bus 包括 myuser mygroup 等等其他信息 用作中间件或者其他什么的处理
    |--------------------------------------------------------------------------
    | $bus['get']        = $_GET
    | $bus['post']       = $_POST
    | $bus['cookie']     = $_COOKIE
    | $bus['session']    = $_SESSION
    | $bus['server']     = $_SERVER
    | $bus['user']       = 数据库中我的用户信息
    | $bus['group']      = 数据库中我的用户组信息
    | $bus['router']     = 当前的路由信息 必须包括 [ 控制器.行为 ]
    | 其他的再自行定义
    |
    |    显示出所有bus信息
    |    print_r(bus()->all());
    |    原子操作的路径
    |    bus()->run('404');
    | 目标是用可以对bus 进行中间件的处理
    */


class Bus extends Base
{

      private $_config  = array();
      public function __construct($config = array()){
            $this->_config = $config;
      }


      //=======================================
      public function run($params = [])
      {
            echo 'pmmrs';
      }

      //=======================================
      public function demo()
      {
            echo 'bus demo!';
            /**
             *    获得对get post cookie file session 的支持
             */
      }

}
