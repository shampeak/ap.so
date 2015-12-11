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

            sapp('ap')->Router([

            ]);

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












/**
 * 总控类
 */
class Application2 extends Set
{
      private static $_instance;
      private function __clone(){}

      public static function DoController(){
            //转交过来的控制器控制权
            //除controllers外，都需要检测根下有没有相对应的组件
            //===========================================================
            //监测控制器文件是否存在
            //监测控制器是否存在

            $router     = C('Router');
            $app        = C('app');


            //回溯地址
            $hspath = $app['APP_PATH'];

            //控制器地址 $router['Appbase']
            if($router['method_modules']){
                  $basepath = $app['APP_PATH'].'Modules/'.$app['modulelist'][$router['method_modules']].'/';
            }else{
                  $basepath = $hspath;
            }

            //insert 基础控制器
            $basecontrollerpath = $basepath.'Controller/BaseController.php';
            includeIfExist($basecontrollerpath);

            //加载扩展控制器
            $controllerfile = $basepath.'Controller/'.$router['method_controller'].'.'.$router['method_action'].'.php';
            //echo $controllerfile;
            includeIfExist($controllerfile);
            if(!class_exists($router['method_controller'])){
                  //加载标准控制器
                  $controllerfile = $basepath.'Controller/'.$router['method_controller'].'.php';
                  includeIfExist($controllerfile);
            }


            //判断控制器是否存在
            if(!class_exists($router['method_controller'])){
                  error404();
                  halt('控制器 : '.$router['method_controller'].'不存在');  //交由扩展进行判断
            }

            //实例化
            $controllerClass = $router['method_controller'];
            $controller = new $controllerClass();

            //动作
            $method = $router['ActionExt'];
            //寻找扩展方法
            if(!method_exists($controller, $method)){
                  $method = $router['Action'];
                  if(!method_exists($controller, $method)){
                        error404();
                        halt('方法'.$method.'不存在');
                  }
            }

            //执行控制器
            $params = $router['param'];
            //=====================================
            //扩展，对mothod 进行修改
            //call_user_func(array($controller,$method),$params);

            /*
            |-------------------------------------------
            | 添加信息进入配置信息
            |-------------------------------------------
            |
            */


            ap()->demo();   //执行中间件



            if(method_exists($controller, '_init'))  $controller->_init();               //前置hook
            $controller->$method($params);  //另一种方式执行

            exit;
      }

    public static function run(){
        //没定义的话给个默认值
        !defined('APPROOT') && define('APPROOT','../App/');;
        spl_autoload_register(array('\Grace\Application', 'autoload'));              //psr-0
        spl_autoload_register(array('Application', 'autoload_controller'));              //psr-0

        /*
        |------------------------------------------------------
        | 建立AP执行流
        |------------------------------------------------------
        | 中间件定义在RouterMiddleware中
        |
        */
         //获取AP对象

          sapp('ap')->routerMiddleware([
              'ApplicationIni'=>Grace\Middleware\ApplicationIni::class,        //初始化操作
              'UriMiddleware'=>Grace\Middleware\UriMiddleware::class,        //初始化操作
          ]);



//var_dump($md);
//print_r(sc());


          //释放控制权 给controller
          //self::DoController();
exit;

        Application(APPROOT)->routerMiddleware([

        ])->doController();       //转交控制权




          //
          Appliction()->md()->docontroller();           //转交控制权



          //读取初始配置
          $file = rtrim(APPROOT,'/').'/Config/Config.php';
          $sc = include($file);
          $sc['APPROOT'] = APPROOT;
          sc($sc);



          /**
           * 获取配置信息
           * 同步配置包括 / 入口配置 / 模块配置 / app配置  / 默认配置 相互覆盖
           * 验证  D(C()); / D(ConfigManager::getInstance($entrance));
           */
          ConfigManager::getInstance($entrance)->load();;             //OK 配置完成  验证

          /**
           * 计算路由信息
           * 验证D(C('Router'))
           */
          Router::getInstance()->load();        //路由信息 D(C('Router'));


//          if($router['method_modules']){
//                $basepath = $app['APP_PATH'].'Modules/'.$app['modulelist'][$router['method_modules']].'/';
//          }else{
//                $basepath = $hspath;
//          }


         // Bootstrap::init();              //初始化执行
          /**
           * 对系统信息运算完毕,准备转交控制权
           * 转交控制权
           */
//app->          [APP_PATH]   => ../App/
//               [GRACE_PATH] => ../Grace/

            //加载Seter
          self::DoController();


exit;


    }


      /**
      * 自动加载函数
      * @param string $class 类名
      */
      public static function autoload($class){
            \includeIfExist(APPROOT.'Grace/Lib/'.$class.'.php');
      }

      /**
       * @param $class
       * 模型
       */
      public static function autoload_controller($class){
            $router = C('Router');
            //回溯地址
            $hspath = C('app')['APP_PATH'];
            //控制器地址
            if($router['method_modules']){
                  $basepath = C('app')['APP_PATH'].'Modules/'.C('app')['modulelist'][$router['method_modules']].'/';
            }else{
                  $basepath = $hspath;
            }

            if(substr($class,-6)=='Widget'){
                  includeIfExist($basepath.'/Widget/'.$class.'.class.php');
            }else{
                  //首先检查在应用目录中是否存在该类，存在加载，不存在，则到根下寻找
                  includeIfExist($basepath.'/Lib/'.$class.'.class.php');
                  if(!class_exists($class)){
                        includeIfExist($hspath.'/Lib/'.$class.'.class.php');
                  }
                  if(!class_exists($class)){
                        includeIfExist($basepath.'/Models/'.$class.'.model.php');
                  }
                  if(!class_exists($class)){
                        includeIfExist($hspath.'/Models/'.$class.'.model.php');
                  }
            }
      }




}



