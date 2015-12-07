<?php
/*
 * Container
 * 调用
 * include('Seter/I.php');			//入口代码
 * $this->Seter = new \Seter\Seter();
 * \Seter\Seter::getInstance()
 * */
namespace Seter;
//!defined('SETER_PATH') && die('out of seter');

class Seter extends \Seter\Core\Base
{
    /*
     * 单例调用
     * */
    private static $instance    = null;         //单例调用

    /*
     * 配置
     * */
    public $Config = array();


//    /**
//     * Key-value array of arbitrary data
//     * @var array
//     */
//    public $data = array();

    private  function __construct($items = array())
    {
        //iniaction
        $this->Config = include(FAST_PATH.'/Config/Default.php');

        $this->singleton('sys', function ($c) {
            return new \Seter\Core\Sys();
        });

        $this->singleton('error', function ($c) {
            return new \Seter\Core\Error();
        });
        /**
         * 系统函数和参数
         */
//        $this->singleton('ry', function ($c) {
//            return new \Seter\Library\ServerAPI('8luwapkvufd1l','428XgqSUvxeAzr');
//        });

        //=================================================
        /**
         * 注入对象
         */
        foreach($this->Config['obj'] as $key=>$value){
            $this->singleton($value['classname'], function () use ($key,$value){
                //echo $this->Config['obj'][$key]['class'];
                return new $this->Config['obj'][$key]['class'];
            });
        }
    }

    public static function run()
    {
        echo 'mvc模式执行';
    }

    //用于密码hash
    public static function pwdhash($str='')
    {
        return $str;
    }

    /*hash函数
     * */
    public static function hash($str='')
    {
        if(empty($str)){
            return '';
        }else{
            return md5($str);
        }
    }

    public static function getInstance(){
        !(self::$instance instanceof self)&&self::$instance = new self();
        return self::$instance;
    }

    /**
     * Normalize data key
     * @param  string $key The data key
     * @return mixed       The transformed/normalized data key
     */
    protected function normalizeKey($key)
    {
        return $key;
    }





    /**
     * Ensure a value or object will remain globally unique
     * @param  string  $key   The value or object name
     * @param  Closure        The closure that defines the object
     * @return mixed
     */
    public function singleton($key, $value)
    {

        $this->set($key, function ($c) use ($value) {
            static $object;
            if (null === $object) {
                $object = $value($c);
            }
            return $object;
        });
    }

    /**
     * Protect closure from being directly invoked
     * @param  Closure $callable A closure to keep from being invoked and evaluated
     * @return Closure
     */
    public function protect(Closure $callable)
    {
        return function () use ($callable) {
            return $callable;
        };
    }

    function __call($function_name, $args)
    {
        echo "function: $function_name (<br />";
        var_dump($args);
        echo ") not exist！";
    }

    //Seter中间的,暂时不用
    public static function autoload($className)
    {
        $thisClass = str_replace(__NAMESPACE__ . '\\', '', __CLASS__);
        $baseDir = __DIR__;
        if (substr($baseDir, -strlen($thisClass)) === $thisClass) {
            $baseDir = substr($baseDir, 0, -strlen($thisClass));
        }

        $className = ltrim($className, '\\');
        $fileName = $baseDir;
        $namespace = '';
        if ($lastNsPos = strripos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            if($namespace == 'F') $namespace = 'Seter\Function';
            $className = substr($className, $lastNsPos + 1);
            $fileName .= str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
        //echo $fileName;
        if (file_exists($fileName)) {
            require $fileName;
        }
    }


    /**
     * Register Slim's PSR-0 autoloader
     * 还有需要psr-0 的包括
     * 模型自己做
     * lib 中
     */
    public static function registerAutoloader()
    {
        spl_autoload_register(__NAMESPACE__ . "\\Seter::autoload");
    }
}


