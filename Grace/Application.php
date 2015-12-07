<?php

//只提供系列快捷函数
include 'Common.php';
define('GRACEROOT',__DIR__.'/');

/**
 * 总控类
 */
class Application {
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

        !defined('APPROOT') && define('APPROOT','../App/');;
        spl_autoload_register(array('Application', 'autoload'));              //psr-0
        spl_autoload_register(array('Application', 'autoload_controller'));              //psr-0
        /*
        |------------------------------------------------------
        | 建立AP执行流
        |------------------------------------------------------
        | 转交控制权注意条件齐备之后转交
        | 中间件定义在RouterMiddleware中
        | 可以在这里进行覆盖定义
        |
        */
        Application(APPROOT)->md([

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
            includeIfExist(GRACEROOT.'Lib/'.$class.'.php');
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



