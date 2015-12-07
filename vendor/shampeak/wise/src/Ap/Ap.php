<?php

namespace Sham\Ap;

use Sham\Set\Base;

    /*
    | --------------------------------------------------------------------------
    | 数据处理流
    | --------------------------------------------------------------------------
    | ap($bus())->md([
    | 'middleware' =>   [
                              //''=>
                        ]
    | ])->go('根据输出标记进行输出,或者不输出');
    | 致命错误直接end
    | 其他错误warn
    | 信息 notice
    | --------------------------------------------------------------------------
    |
    | psr-3
    | const EMERGENCY = 'emergency';
    | const ALERT     = 'alert';
    | const CRITICAL  = 'critical';
    | const ERROR     = 'error';
    | const WARNING   = 'warning';
    | const NOTICE    = 'notice';
    | const INFO      = 'info';
    | const DEBUG     = 'debug';
    |
    */


class Ap extends Base
{

      private $_config              = array();
      private $routeMiddleware      = array();

      //映射为整个bus
      private $stream               = array();        //用作穿过中间件的数据流
      //映射为bus['display']
      private $display               = array();       //显示的标记 [type code mb msg temppath cacheonly]

      public function __construct($config = array()){
            $this->_config = $config;
            //对ap 进行一些基础设置
            $this->routeMiddleware = [
                'beforeController' => \App\Middleware\BeforeController::class,
            ];

            /*
            |-------------------------------------------
            | 建立信息sc
            |-------------------------------------------
            | 主要是配置信息
            | App/config.php + C() + Struct;
            */
            // print_r(sc());
            sc(C());
            sc('Struct',sapp('struct')->all());


            /*
            |-------------------------------------------
            | 建立信息bus
            |-------------------------------------------
            | 主要是运行过程中的信息,和运算结果
            | bus 初始化执行
            */
            bus('modules',    C('Router')['method_modules']);         //模块
            bus('controller', C('Router')['method_controller']);      //控制器
            bus('method',     C('Router')['method_action']);          //行为
            bus('ext',        C('Router')['method_action_ext']);      //行为扩展

            //添加Middleware 进入bus
//          bus('Middleware', sc('Middleware'));                  //中间件定义

            bus('router',     C('Router'));        //路由

            bus('user',       geter('user.info'));                //用户相关
            bus('usergroup',  geter('user.group'));               //用户组信息
            bus('userrulelib',geter('user.rulelib'));             //用户组权限信息

            bus('menu', []);               //后台菜单
            bus('page', []);               //页面信息
            bus('rules',sc('rules'));     //rbacrules
            bus('app',  sc('app'));         //app相关

            //req -> request
            bus('req',[
                'get'       => C('Router')['params'],
                'post'      => $_POST,
                'cookies'   => $_COOKIE,
                'session'   => $_SESSION,
                'server'    => $_SERVER,
            ]);
            bus('display',    []);               //页面信息
            bus('touchlist',  []);               //接触日志



            sapp('Mmc')->set('demo1',null,10000);
            $ms1 = sapp('Mmc')->get('demo1');



      }

      /*
      |--------------------------------------------------------------------------
      | 把bus教给中间件处理
      |--------------------------------------------------------------------------
      |
      */
      public function md($request,Closure $next)
      {
            /*
             * r  读取检查 - md
             * up 读取更改 - md
             * ne 新建     - md
             */
            //touchlist
            //执行中间件,返回request
      }



      //=======================================
      public function demo()
      {

            //echo 'ap demo!';
            /**
             *    获得对get post cookie file session 的支持
             */
      }

}


/**
 *
public function handle($request, Closure $next)
{
if ($request->input('age') <= 200) {
return redirect('home');
}

return $next($request);
} */
/*
xcache_get(string name)
bool xcache_set(string name, mixed value [, int ttl])
bool xcache_isset(string name)
bool xcache_unset(string name)


eAccelerator,xcache是PHP缓存扩展
memcached、APC缓存是数据库缓存扩展
采用方案xcache + memcached

xcache 存储 系统文件设置的 cs
memcached 存储数据库和用户的数据 bus

是什么数据需要缓存必须有一个明确的界限
*/