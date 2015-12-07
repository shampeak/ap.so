<?php
/**
 * @link http://www.simple-inc.cn/
 * @copyright Copyright (c) 2014 Simple-inc Software inc
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */

class ConfigManager
{
    protected static $configmanager;

    public $AppDefaultConfig;
    public $ent;
    public $env;
    public $headers;
    public $app;
    public $modulelist;

    private function __construct($entrance)
    {
        //创建config
        $this->AppDefaultConfig = $this->AppDefaultConfig();

        //入口配置
        $this->ent = $entrance;

        //获取环境参数
        $this->env = Environment::getInstance()->get();

        //HTTP request headers (retains HTTP_ prefix to match $_SERVER)
        $this->headers = Headers::extract($_SERVER);

        //获取app 配置
        $file = $this->ent['CONF_FILE'] = $this->ent['CONF_FILE']?:'Conf.php';
        $this->app = G($this->ent['APP_PATH'].$file);

        //所有配置的模块列表
        $modulelist = $this->ent['modulelist']?:$this->app['modulelist'];
        $modulelist = is_array($modulelist)?$modulelist:[];
        $this->modulelist = array_keys($modulelist);
    }

    /**
     * Get environment instance (singleton)
     */
    public static function getInstance($entrance='')
    {
        if (is_null(self::$configmanager)) {
            self::$configmanager = new self($entrance);
        }
        return self::$configmanager;
    }

    public function Load()
    {
        $module = Router::getInstance()->getModule();
        $file = $this->ent['CONF_FILE'] = $this->ent['CONF_FILE']?:'Conf.php';
        $filep = $this->ent['APP_PATH'].'Modules/'.$this->app['modulelist'][$module].'/'.$file;
        $this->moduleConfig = G($filep);

        //configmix
        $this->mixConfig($module);
        return true;
    }

    public function mixConfig($module)
    {
        $Conf['headers'] = $this->headers;
        $Conf['env'] = $this->env;


        //app 配置
        $con = array_merge($this->app,$this->moduleConfig);
        $con = array_merge($con,$this->ent);
        $con = array_merge($this->AppDefaultConfig,$con);
        $Conf['app'] = $con;

        //获取rules 配置
        $file = 'Rules.php';
        $fileb = $this->ent['APP_PATH'].$file;
        $filep = $this->ent['APP_PATH'].'Modules/'.$this->app['modulelist'][$module].'/'.$file;
        $rules = G($fileb);
        if($module){             $rules_ =  G($filep);         }
        if(!empty($rules_)){
            $access = array_merge($rules['access']['rules'],$rules_['access']['rules']?:[]);
            unset($rules['access']['rules']);
            unset($rules_['access']['rules']);
            $rules = array_merge($rules,$rules_?:[]);
            $rules['access']['rules'] = $access;
        }
        $Conf['rules'] = $rules;

        C($Conf);

//        $Conf['ent'] = $this->ent;
//        $Conf['AppDefaultConfig'] = $this->AppDefaultConfig;
//        $Conf['moduleConfig'] = $this->moduleConfig;
//        $Conf['app'] = $this->app;
//        +app
//        $Conf['modulelist'] = $this->modulelist;
        return true;
    }


    /**
     * 查找配置信息
     * @param $name
     * @return mixed
     */
    public function get($name)
    {
        return C($name);
    }

    /**
     * 默认配置
     * @return array
     */
    public function AppDefaultConfig(){
        return [
            'APP_PATH'  =>    '../App/',
            //'APP_BASE_PATH'  =>    '../App/',
            'GRACE_PATH'=>      '../Grace/',
            'WDS'               => DIRECTORY_SEPARATOR,
            'CONF_FILE'         => 'Conf.php',
            'default_timezone'  => 'PRC',
            'charset'           => 'utf-8',

            'error_page_404'    => 'error/error_404.php',
            'error_page_500'    => 'error/error_500.php',
            'error_page_msg'     => 'error/error_msg.php',
            'message_page_view' => 'error/error_view.php',

            //相对路径
//            'controller_folder' => 'Controller/',
//            'model_folder'      => 'Models/',
//            'view_folder'       => 'Views/',
//            'library_folder'    => 'Lib/',
//            'helper_folder'     => 'helper/',
            //相对路径

            'default_controller'        => 'home',
            'default_controller_method' => 'index',
            'default_controller_method_prefix'  => 'do',

            //扩展名
//            'controller_file_subfix'    => '.php',
//            'model_file_subfix'         => '.php',
//            'view_file_subfix'          => '.php',
//            'library_file_subfix'       => '.php',
//            'helper_file_subfix'        => '.php',
            'debug' => true,
        ];
    }


}