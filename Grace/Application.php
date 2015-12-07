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

    public static function run($entrance){
          spl_autoload_register(array('Application', 'autoload'));              //psr-0
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


          Bootstrap::init();              //初始化执行
          /**
           * 对系统信息运算完毕,准备转交控制权
           * 转交控制权
           */
//app->          [APP_PATH]   => ../App/
//               [GRACE_PATH] => ../Grace/

            //加载Seter
          spl_autoload_register(array('Application', 'autoload_controller'));              //psr-0
          includeIfExist(C('app')['APP_PATH'].'/Seter/I.php');
          self::DoController();









exit;




































            exit;





          /**
           *
          D(C());
//
//          D($request->headers);
//          D($request->env);
//          D($request->cookies);
//
//          exit;
//          D(C('env'));
////          D($request->getMethod());       //提交的方法
////          D($request->isGet());           //提交的方法
////          D($request->isPost());          //提交的方法
////          D($request->isPut());           //提交的方法
////          D($request->isPatch());       //提交的方法
////          D($request->isDelete());       //提交的方法
////          D($request->isOptions());       //提交的方法
//
//          D($request->getHost());
//          D($request->getHostWithPort());
//          D($request->getPort());
//          echo '------';
//          /**
//           * 下面三个path模式下不准确
//           * /
//          D($request->getScriptName());
//          D($request->getRootUri());
//          D($request->getPath());
//          D($request->getPathInfo());     //同下
//          D($request->getResourceUri()); //同上
//
//          D($request->getIp());
//
//          D($request->getRootUri());
           */

          /**
           * 调试
          //验证系列配置数据
          D(ConfigManager::get('modulelist'));
          D(ConfigManager::get('app_defaultConfig'));
          D(ConfigManager::get('ent'));
          D(ConfigManager::get('env'));
          D(ConfigManager::get('app'));
          D(C());
          */

          /**
           * 对request的验证
           */



            /**
             * 生成对象
             * router
             * config
             * request
             * bootstrap::ini();
            ->>>>>>>>>>>>
            在 go 中
            //=================================
            request     ok
            router      ok
            config      ok
            bootrun     ok
            //=================================
            go中 ini ok

            控制权交给go
            Application::go     -> 生成response对象 ->view/json
            */



      /**
          //config
          //ConfigManager::Load($conf);
          //D(ConfigManager::get('mysql'));
          //D(ConfigManager::get('Rbacdb'));
          //D(ConfigManager::get('User'));
          //D(ConfigManager::get('modules'));
//        D(ConfigManager::get('Router'));
//        Router::getInstance()->load();
          //$router = Router::getInstance()->getrouter();           //获得router
          //OK



          //这里准备好
//          $router
//          $config
//          $_REQUEST
      */

        //首先运行自动加载文件

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



