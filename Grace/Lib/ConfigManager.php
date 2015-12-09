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

    private function __construct()
    {
        //获取环境参数
        $this->env = Environment::getInstance()->get();

        //HTTP request headers (retains HTTP_ prefix to match $_SERVER)
        $this->headers = Headers::extract($_SERVER);

    }

    /**
     * Get environment instance (singleton)
     */
    public static function getInstance()
    {
        if (is_null(self::$configmanager)) {
            self::$configmanager = new self();
        }
        return self::$configmanager;
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