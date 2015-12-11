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
            $basepath =       sc('Router')['m']?rtrim(APPROOT,'/').'/Modules/'.sc('Modulelist')[sc('Router')['m']].'/':rtrim(APPROOT,'/').'/';
            bus('basepath',   $basepath);
            bus('app',        sc('App'));
            bus('router',     sc('Router'));
            bus('env',        sc('Env'));
            //|-----------------------------------------------
            $controller = '\Controller\\'.sc('Router')['c'];
            $action = sc('Router')['action'];
            $params = sc('Router')['param'];

            if(sc('Router')['m']){
                  $basepath = rtrim(APPROOT,'/').'/Modules/'.sc('Modulelist')[sc('Router')['m']].'/Controller/';
            }else{
                  $basepath = rtrim(APPROOT,'/').'/'.'Controller/';
            }
            $basecontrollerpath     = $basepath.'BaseController.php';
            $controllerextpath      = $basepath.(sc('Router')['c']).'.'.(sc('Router')['a']).'.php';
            $controllerpath         = $basepath.(sc('Router')['c']).'.php';

            //加载基类 - 如果基类存在,则加载
            includeIfExist($basecontrollerpath);

            //尝试扩展控制器 - 尝试控制器
            includeIfExist($controllerextpath);
            if(!class_exists($controller)){
                  includeIfExist($controllerpath);
            }
            //--------------------------------------------------------

            if(!class_exists($controller)){     //控制器还没有找到,则报错
                  //404
                  echo $controller.'404 controller miss';
            }

            //实例化
            $app = new $controller();                 //这里已经正常了

            //寻找扩展方法
            if(!method_exists($app, $action)){
                  echo $action.'404 method miss';
            }


            //$behaviors  = $app->behaviors();    //行为约束
            //$middleware = $app->middleware();   //中间件

            //执行中间件
            //$this->md([
            //    'asdf' => 'asdf',
            //    'asdf' => 'asdf',
            //    'asdf' => 'asdf',
            //    'asdf' => 'asdf',
            //    'asdf' => 'asdf',
            //]);


            //执行
            $app->$action($params);//执行
            //$app->response();
            //后继的工作是ControllerAfterMiddleware

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
      | sapp()->vv('SysMiddlewareBusini');
      |
      */
      public function _vv($middlewarekey = null)
      {
            if(!sc('debug')) return null;
            if($middlewarekey){
                  return $this->middlewarelist[$middlewarekey]->view();
            }else{
                  return $this->middlewarelist;
            }
      }

}


