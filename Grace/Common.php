<?php
/**
 * 一切的基础，基础函数和常量
 */

//
//
//// System Start Time
//define('START_TIME', $_SERVER['REQUEST_TIME_FLOAT']);
//// System Start Memory
//define('START_MEMORY_USAGE', memory_get_usage());
//
//// Extension of all PHP files
//define('EXT', '.php');
//
//// Directory separator (Unix-Style works on all OS)
//define('DS', '/');
//
//// Absolute path to the system folder
//define('SP', realpath(__DIR__). '/');
//
//// Is this an AJAX request?
//define('AJAX_REQUEST', strtolower(getenv('HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest');
//
//// The current TLD address, scheme, and port
//define('DOMAIN', (strtolower(getenv('HTTPS')) == 'on' ? 'https' : 'http') . '://'
//    . getenv('HTTP_HOST') . (($p = getenv('SERVER_PORT')) != 80 AND $p != 443 ? ":$p" : ''));
//
//// The current site path
//define('PATH', parse_url(getenv('REQUEST_URI'), PHP_URL_PATH));
//
////// Default timezone of server
//date_default_timezone_set('PRC');

//// iconv encoding
//iconv_set_encoding("internal_encoding", "UTF-8");

//// multibyte encoding
//mb_internal_encoding('UTF-8');

//// Enable global error handling
//set_error_handler(array('\Micro\Error', 'handler'));
//register_shutdown_function(array('\Micro\Error', 'fatal'));

//echo '<br>START_TIME : '.START_TIME;
//echo '<br>START_MEMORY_USAGE : '.START_MEMORY_USAGE;
//echo '<br>EXT : '.EXT;
//echo '<br>DS : '.DS;
//echo '<br>SP : '.SP;
//echo '<br>AJAX_REQUEST : '.AJAX_REQUEST;
//echo '<br>DOMAIN : '.DOMAIN;
//echo '<br>PATH : '.PATH;

    function Ge($str = ''){
        return \G\Geter::getInstance()->get($str);
    }

/**
 * @param $filename
 * @return array|mixed
 * 获取配置文件中返回的数据
 */
function G($filename){
    if(file_exists($filename)){
        return include $filename;
    }
    return [];
}


//
///**
// * @return array|mixed
// * 返回AccessRules
// */
//function RULES(){
//    $rules = $rules_ = [];
//    if(file_exists(C('BASE_FULL_PATH').'Rules.php')){
//        $rules = include C('BASE_FULL_PATH').'Rules.php';
//    }
//    if(!empty(C('router')['Module'])){
//        $rulepath =  C('APP_FULL_PATH').'Rules.php';
//        if(file_exists($rulepath)){
//            $rules_ = include $rulepath;
//        }
//    }
//    if(!empty($rules_)){
//        $access = array_merge($rules['access']['rules'],$rules_['access']['rules']?:[]);
//        unset($rules['access']['rules']);
//        unset($rules_['access']['rules']);
//        $rules = array_merge($rules,$rules_?:[]);
//        $rules['access']['rules'] = $access;
//    }
//    return $rules;
//}

/**
 * 返回资源的绝对定位地址
 * @param $path
 * @return mixed|string
 */
function truepath($path) {
    //是linux系统么？
    $unipath = PATH_SEPARATOR == ':';
    //检测一下是否是相对路径，windows下面没有:,linux下面没有/开头
    //如果是相对路径就加上当前工作目录前缀
    if (strpos($path, ':') === false && strlen($path) && $path{0} != '/') {
        $path = realpath('.') . DIRECTORY_SEPARATOR . $path;
    }
    $path = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $path);
    $parts = array_filter(explode(DIRECTORY_SEPARATOR, $path), 'strlen');
    $absolutes = array();
    foreach ($parts as $part) {
        if ('.' == $part)
            continue;
        if ('..' == $part) {
            array_pop($absolutes);
        } else {
            $absolutes[] = $part;
        }
    }
    //如果是linux这里会导致linux开头的/丢失
    $path = implode(DIRECTORY_SEPARATOR, $absolutes);
    //如果是linux，修复系统前缀
    $path = $unipath ? (strlen($path) && $path{0} != '/' ? '/' . $path : $path) : $path;
    //最后统一分隔符为/，windows兼容/
    $path = str_replace(array('/', '\\'), '/', $path);
    return $path;
}

/**
 * 获取和设置配置参数 支持批量定义
 * 如果$key是关联型数组，则会按K-V的形式写入配置
 * 如果$key是数字索引数组，则返回对应的配置数组
 * @param string|array $key 配置变量
 * @param array|null $value 配置值
 * @return array|null
 */
function C($key = '',$value=null){
    static $_config = array();
    $args = func_num_args();
    //返回所有值
    if($args == 0){
            return $_config;
    }
    //某一个返回值 这个值是字符串或者数组
    if($args == 1){
        if(is_string($key)){  //如果传入的key是字符串
            return isset($_config[$key])?$_config[$key]:null;
        }
        if(is_array($key)){
            if(array_keys($key) !== range(0, count($key) - 1)){  //如果传入的key是关联数组
                $_config = array_merge($_config, $key);
            }else{
                $ret = array();
                foreach ($key as $k) {
                    $ret[$k] = isset($_config[$k])?$_config[$k]:null;
                }
                return $ret;
            }
        }
    }else{
        //设置一个值
        if(is_string($key)){
            $_config[$key] = $value;
        }else{
            halt('传入参数不正确');
        }
    }
    return null;
}

/**
 * 调用Widget
 * @param string $name widget名
 * @param array $data 传递给widget的变量列表，key为变量名，value为变量值
 * @return void
 */
function W($name, $data = array()){
    $fullName = $name.'Widget';
    if(!class_exists($fullName)){
        halt('Widget '.$name.'不存在');
    }
    $widget = new $fullName();
    $widget->invoke($data);
}

/**
 * 终止程序运行
 * @param string $str 终止原因
 * @param bool $display 是否显示调用栈，默认不显示
 * @return void
 */
function halt($str, $display=false){
    //Log::fatal($str.' debug_backtrace:'.var_export(debug_backtrace(), true));
    header("Content-Type:text/html; charset=utf-8");
    if($display){
        echo "<pre>";
        debug_print_backtrace();
        echo "</pre>";
    }
    echo $str;
    exit;
}

/**
 * 获取数据库实例
 * @return DB
 */
function M(){
    return \Seter\Seter::getInstance()->db;
}

/**
 * 如果文件存在就include进来
 * @param string $path 文件路径
 * @return void
 */
function includeIfExist($path){
    if(file_exists($path)){
        include $path;
    }
}

//页面跳转
function R($url, $time=0, $msg='') {
    $url = str_replace(array("\n", "\r"), '', $url);
    if (empty($msg))
        $msg = "系统将在{$time}秒之后自动跳转到{$url}！";
    if (!headers_sent()) {
        // redirect
        if (0 === $time) {
            header('Location: ' . $url);
        } else {
            header("refresh:{$time};url={$url}");
            echo($msg);
        }
        exit();
    } else {
        $str = "<meta http-equiv='Refresh' content='{$time};URL={$url}'>";
        if ($time != 0)
            $str .= $msg;
        exit($str);
    }
}




/**
 * 404错误页面
 * 页面内容 C('error_page_404');设置
 */
function error404()
{
    //header('HTTP/1.1 404 Not Found');
    //header("status: 404 Not Found");
    include C('Router')['Appbase'].C('app')['error_page_404'];
    exit;
}

/**
 * 提示信息页面
 * @param string $msg
 * 页面设置 C('error_page_msg');
 */
function errormsg($msg = '')
{
    include C('Router')['Appbase'].C('app')['error_page_msg'];
    //include C('error_page_msg');
    exit;
}

/**
 * 500错误页面
 * 设置C('error_page_500');
 */
function error500()
{
    header('HTTP/1.1 500 Error Found');
    header("status: 500 Not Found");
    include C('error_page_500');
    exit;
}

/**
 * 返回当前时间戳 毫秒
 * @return float
 */
function T(){
    list($usec, $sec) = explode(" ",microtime());
    $num = ((float)$usec + (float)$sec);
    return $num;
}


/**
 * 获取IP地址
 * @param type null
 * @return string like '12.70.0.1'
 */
function GetIP(){
    if(!empty($_SERVER["HTTP_CLIENT_IP"])){
        $cip = $_SERVER["HTTP_CLIENT_IP"];
    }
    elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
        $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    }
    elseif(!empty($_SERVER["REMOTE_ADDR"])){
        $cip = $_SERVER["REMOTE_ADDR"];
    }
    else{
        $cip = "无法获取！";
    }
    return $cip;
}


function RULES(){
    $rules = $rules_ = [];
    if(file_exists(C('app')['APP_PATH'].'Rules.php')){
        $rules = include C('app')['APP_PATH'].'Rules.php';
    }
    if(!empty(C('Router')['method_modules'])){
        $rulepath =  C('Router')['Appbase'].'Rules.php';
        if(file_exists($rulepath)){
            $rules_ = include $rulepath;
        }
    }
    if(!empty($rules_)){
        $access = array_merge($rules['access']['rules'],$rules_['access']['rules']?:[]);
        unset($rules['access']['rules']);
        unset($rules_['access']['rules']);
        $rules = array_merge($rules,$rules_?:[]);
        $rules['access']['rules'] = $access;
    }
    return $rules;
}
