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
      public function Router()
      {
            //根据路由执行系列操作
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
                  return $this->middlewarelist;
            }
      }

}


