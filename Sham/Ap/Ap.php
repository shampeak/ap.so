<?php

namespace Sham\Ap;

    /*
    | --------------------------------------------------------------------------
    | AP的定义 - 对中间件进行调用和定义,执行,包括输出信息
    | --------------------------------------------------------------------------
    | 这里不对middle列表进行定义和检查,交给上层Application
    |
    */

use Sham\Set\Base;

    /*
    | --------------------------------------------------------------------------
    | 可以对middleware进行输出信息查看 方法为 $md->display();
    | --------------------------------------------------------------------------
    |
    if(is_array($middleware)){
          foreach($middleware as $key => $value){
                $md = new $value;
                $next    = $md->next();
                $request = $md->request();
                $request = $md->AfterHandle($md->Handle($md->BeforeHandle($request,$next),$next),$next);
                $md->terminate($request);
          }
    }
    |
    */


class Ap extends Base
{

      private $_config              = array();
      private $middlewarelist              = array();

      public function __construct($config = array()){
            $this->_config = $config;
      }

      /*
      |--------------------------------------------------------------------------
      | 执行中间件
      |--------------------------------------------------------------------------
      |
      */
      public function Middleware($middlewarelist)
      {
            if(is_array($middlewarelist)){
                  foreach($middlewarelist as $key => $value){
                        //这里需要进一步测试,来展示对资源的占用情况
                        if(sc('debug')){
                              //debug 模式下直接调用
                              $this->middlewarelist[$key] = new $value;
                              $this->middlewarelist[$key]->run();;         //执行中间件
                        }else{
                              //debug = false unset
                              //or 这里关系到对内存的占用情况
                              $ms = new $value;
                              $ms->run();
                              unset($ms);
                        }
                  }
            }
      }

      /*
      |--------------------------------------------------------------------------
      | 调试方法
      |--------------------------------------------------------------------------
      | sapp()->view('SysMiddlewareBusini');
      |
      */
      public function view($middlewarekey = null)
      {
            if(!sc('debug')) return null;
            if($middlewarekey){
                  return $this->middlewarelist[$middlewarekey]->view();
            }else{
                  return null;
            }
      }

}



/*
sc('Struct',config('Struct'));

   //$md = config('Struct');          //利用函数获取配置
print_r(sc());

echo 'mark';
exit;
print_r(vc());
print_r(sc());

//            //对ap 进行一些基础设置
//
//            /*
//            |-------------------------------------------
//            | 建立信息sc
//            |-------------------------------------------
//            | 主要是配置信息
//            | App/config.php + C() + Struct;
//            */
//            // print_r(sc());
//            sc(C());
//
//
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