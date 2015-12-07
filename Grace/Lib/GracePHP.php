<?php

/**
 * 总控类
 */
class GracePHP {

    /**
     * 模块
     * @var
     */
    private $m;
    /**
     * 控制器
     * @var string
     */
    private $c;
    /**
     * Action
     * @var string
     */
    private $a;
    /**
     * 单例
     * @var SinglePHP
     */
    private static $_instance;
    private static $_conf;

    /**
     * 构造函数，初始化配置
     * @param array $conf
     */
    private function __construct($conf){
        St::__ini();
        C($conf);
        $conf['CONF_FILE'] = isset($conf['CONF_FILE'])?$conf['CONF_FILE']:'Conf.php';
        $conf = G($conf['APP_PATH'].$conf['CONF_FILE']);
        if(isset($conf['APP_PATH'])) unset($conf['APP_PATH']);
//        $conf['modules']['super'] = 'hmvc_s';               //内置 debug
        $conf = array_merge(self::loadAppDefaultConfig(),$conf);
        C($conf);
    }

    private function __clone(){}

    /**
     * 获取单例
     * @param array $conf
     * @return SinglePHP
     */
    public static function getInstance($conf){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self($conf);
        }
        return self::$_instance;
    }

    /**
     * 运行应用实例
     * @access public
     * @return void
     */
    public function run(){
        //所有请求都会请求到这里
        /*
         * 统一入口
         * */





        if(C('USE_SESSION') == true){
            session_start();
        }
        $router = new router();
        $conf['router'] = $router();        //这个是路由

        C($conf);                           //路由进配置
        $this->loadAppConfig();             //覆盖hmvc配置
        C('APP_FULL_PATH', truepath(getcwd().'/'.C('APP_PATH')).'/');
        C('BASE_FULL_PATH', truepath(getcwd().'/'.C('APP_BASE')).'/');
        spl_autoload_register(array('GracePHP', 'autoload'));              //psr-0
        includeIfExist(C('BASE_FULL_PATH').'Seter/I.php');              //第一时间载入服务层

        //除controllers外，都需要检测根下有没有相对应的组件
        //===========================================================
        $router = C('router');
        $router['params'] = isset($router['params'])?$router['params']:[];
        $params = $router['params_'];
        //===========================================================
        $controllerfile2 = C('APP_FULL_PATH').C('controller_folder').'BaseController'.C('controller_file_subfix');
        includeIfExist($controllerfile2);

        //================================================
        //标准控制器不存在，检查扩展控制器
        $controller_ext_file = $router['Controller'].'.'.$router['Action'].".php";
        $controllerfile = C('APP_FULL_PATH').C('controller_folder').$controller_ext_file;
        includeIfExist($controllerfile);
        if(!class_exists($router['Controller'])){
            //扩展控制器没有加载成功 加载标准控制器
            $controllerfile = C('APP_FULL_PATH').C('controller_folder').$router['Controller'].C('controller_file_subfix');
            includeIfExist($controllerfile);
            //===========================================================
        }

        //判断控制器是否存在
        if(!class_exists($router['Controller'])){
            //404
            error404();
            halt('控制器'.$router['Controller'].'不存在');  //交由扩展进行判断
        }



        //实例化
        $controllerClass = $router['Controller'];
        $controller = new $controllerClass();
        //确定运行的方法
        //判断扩展方法
        $act_ext = $router['ispost']?'_post':'';
        $act_ext = ($router['Action_ext'] != 'post')?$act_ext:'';


        $method = 'do'.ucfirst($router['Action']).'_'.$router['Action_ext'].$act_ext;
        if(!method_exists($controller, $method)){
            //扩展post没找到
            $method = 'do'.ucfirst($router['Action']).'_'.$router['Action_ext'];
            if(!method_exists($controller, $method)){
                //扩展方法不存在，判断主方法
                $method = 'do'.ucfirst($router['Action']);
                if(!method_exists($controller, $method)){
                    error404();
//                    halt('方法'.$method.'不存在2');
                }
            }
        }



//        $params = $router['params'];
//        if(count($router['params']) ==1 ){
//            $nr = current(array_values($router['params']));
//            if(empty($nr)){
//                $params = current(array_keys($router['params']));
//            }
//        }
        //=====================================
        //扩展，对mothod 进行修改

        //标准动作扩展 insert update delete select json
        //_se[post]  _cg [change]    _de [delete]    json[jsonout]   vf[view flit] 显示筛选
        call_user_func(array($controller,$method),$params);

    }


    /**
     * 路由已经准备好了
     * 根据路由获取hmvc的配置信息
     */
    public function loadAppConfig()
    {
        $router = C('router');
        $modules = C('modules');

        if($router['Module']){
            C('APP_PATH',C('APP_PATH').'Modules/'.$modules[$router['Module']].'/');
            $conf = G(C('APP_PATH').C('CONF_FILE'));
            /**
             * 去除掉屏蔽的设置
             */
            if(isset($conf['APP_PATH']))    unset($conf['APP_PATH']);
            if(isset($conf['modules']))     unset($conf['modules']);
            if(isset($conf['router']))      unset($conf['router']);
            C($conf);
        }
        /**
         * 补全route信息
         */
        $router = C('router');
        if(empty($router['Controller']))$router['Controller'] = C('default_controller');
        if(empty($router['Action']))$router['Action'] = C('default_controller_method');
        C('router',$router);
        return true;
    }

    /**
     * 默认配置
     * @return array
     */
    public static function loadAppDefaultConfig(){
        return [
            'APP_BASE'          => C('APP_PATH'),
            'WDS'               => DIRECTORY_SEPARATOR,
            'CONF_FILE'         => 'Conf.php',
            'default_timezone'  => 'PRC',
            'charset'           => 'utf-8',
            'CONF_FILE'         => 'Conf.php',

            'error_page_404'    => C('APP_PATH').'error/error_404.php',
            'error_page_500'    => C('APP_PATH').'error/error_500.php',
            'error_page_msg'     => C('APP_PATH').'error/error_msg.php',
            'message_page_view' => C('APP_PATH').'error/error_view.php',


            //相对路径
            'controller_folder' => 'Controller/',
            'model_folder'      => 'Models/',
            'view_folder'       => 'Views/',
            'library_folder'    => 'Lib/',
//            'helper_folder'     => 'helper/',
            //相对路径

            'default_controller'        => 'home',
            'default_controller_method' => 'index',
            'controller_method_prefix'  => 'do',

            //扩展名
            'controller_file_subfix'    => '.php',
            'model_file_subfix'         => '.php',
            'view_file_subfix'          => '.php',
            'library_file_subfix'       => '.php',
            'helper_file_subfix'        => '.php',

            'debug' => true,
        ];
    }



    /**
     * 自动加载函数
     * @param string $class 类名
     */
    public static function autoload($class){
        if(substr($class,-6)=='Widget'){
            includeIfExist(C('APP_FULL_PATH').'/Widget/'.$class.'.class.php');
        }else{
            //首先检查在应用目录中是否存在该类，存在加载，不存在，则到根下寻找
            includeIfExist(C('APP_FULL_PATH').'/Lib/'.$class.'.class.php');
            if(!class_exists($class)){
                includeIfExist(C('BASE_FULL_PATH').'/Lib/'.$class.'.class.php');
            }
            if(!class_exists($class)){
                includeIfExist(C('APP_FULL_PATH').'/Models/'.$class.'.model.php');
            }
            if(!class_exists($class)){
                includeIfExist(C('BASE_FULL_PATH').'/Models/'.$class.'.model.php');
            }
        }
    }
}

