<?php

namespace App;

use Grace\Set\Set;

    /*
    |------------------------------------------------
    | 总控类
    |------------------------------------------------
    |
    */

class Application extends Set
{
      /*
      |------------------------------------------------
      | 信息流入口
      |------------------------------------------------
      | 对信息流底层进行各种中间件操作,执行最后结果交给控制器
      |------------------------------------------------
      |
      */

      public static function DoController()
      {
            /*
            |------------------------------------------------
            | 入口数据 sc
            | 出口数据 bus
            |------------------------------------------------
            */

            //D(sc());
            //执行前置中间件
            sapp('ap')->Middleware([
                  //初始化的信息流处理
                  'ControllerBeforeMiddleware'      => \App\Middleware\ControllerBeforeMiddleware::class,         //建立dc
            ]);

            sapp('ap')->Router();

            /*
            |------------------------------------------------
            */
            sapp('ap')->Middleware([
                  //初始化的信息流处理
                'ControllerAfterMiddleware'      => \App\Middleware\ControllerAfterMiddleware::class,         //建立dc
            ]);
            exit;
      }

      public static function run()
      {
            !defined('APPROOT') && define('APPROOT', '../App/');;

            sc([
                'debug'               => dc('debug'),
                'error_reporting'   => dc('error_reporting'),
            ]);


            /*
            |------------------------------------------------
            | 错误抑制
            |------------------------------------------------
            */

            if(sc('debug')){
                  //错误报告
                  ini_set('error_reporting', sc('error_reporting'));
            }else{
                  //不报告任何错误
                  error_reporting(0);
            }


            /*
            |------------------------------------------------
            | 初始化 App/Config/Config.php
            |------------------------------------------------
            */
            sapp('ap')->Middleware([
                  //初始化的信息流处理
                  'SysMiddlewareConfigini'      => \Grace\Middleware\SysMiddlewareConfigini::class,         //建立dc
                  'SysMiddlewareEnvini'         => \Grace\Middleware\SysMiddlewareEnvini::class,            //建立sc() unset dc
                  'SysMiddlewareRouter'         => \Grace\Middleware\SysMiddlewareRouter::class,
            ]);
            //D(sc());
            //D(dc());          //debug = false 的时候置空

            /* -> 获得底层数据sc
            |------------------------------------------------
            | 初始化 App/Config/Config.php
            |------------------------------------------------
            |            开始释放控制权
            */
            self::DoController();

      }
}






//
//            /*
//            |-------------------------------------------
//            | 建立信息bus
//            |-------------------------------------------
//            | 主要是运行过程中的信息,和运算结果
//            | bus 初始化执行
//            */
//            bus('modules',    C('Router')['method_modules']);         //模块
//            bus('controller', C('Router')['method_controller']);      //控制器
//            bus('method',     C('Router')['method_action']);          //行为
//            bus('ext',        C('Router')['method_action_ext']);      //行为扩展
//
//            //添加Middleware 进入bus
//            bus('Middleware', sc('Middleware'));                  //中间件定义
//
//            bus('router',     C('Router'));        //路由
//
//            bus('user',       geter('user.info'));                //用户相关
//            bus('usergroup',  geter('user.group'));               //用户组信息
//            bus('userrulelib',geter('user.rulelib'));             //用户组权限信息
//
//            bus('menu', []);               //后台菜单
//            bus('page', []);               //页面信息
//            bus('rules',sc('rules'));     //rbacrules
//            bus('app',  sc('app'));         //app相关
//
//            //req -> request
//            bus('req',[
//                'get'       => C('Router')['params'],
//                'post'      => $_POST,
//                'cookies'   => $_COOKIE,
//                'session'   => $_SESSION,
//                'server'    => $_SERVER,
//            ]);
//            bus('display',    []);               //页面信息
//            bus('touchlist',  []);               //接触日志
//
//
//
//            sapp('Mmc')->set('demo1',null,10000);
//            $ms1 = sapp('Mmc')->get('demo1');
//print_r($this->routeMiddleware);
//print_r($this->Middleware);
//
//sc();









