<?php
/**
* 日志类
* 使用方法：Log::fatal('error msg');
* 保存路径为 App/Log，按天存放
* fatal和warning会记录在.log.wf文件中
*/
class Log{
/**
* 打日志，支持SAE环境
* @param string $msg 日志内容
* @param string $level 日志等级
* @param bool $wf 是否为错误日志
*/
public static function write($msg, $level='DEBUG', $wf=false){
//        if(function_exists('sae_debug')){ //如果是SAE，则使用sae_debug函数打日志
//            $msg = "[{$level}]".$msg;
//            sae_set_display_errors(false);
//            sae_debug(trim($msg));
//            sae_set_display_errors(true);
//        }else{
$msg = date('[ Y-m-d H:i:s ]')."[{$level}]".$msg."\r\n";
$logPath = C('APP_FULL_PATH').'/Log/'.date('Ymd').'.log';
if($wf){
$logPath .= '.wf';
}
file_put_contents($logPath, $msg, FILE_APPEND);
//        }
}

/**
* 打印fatal日志
* @param string $msg 日志信息
*/
public static function fatal($msg){
self::write($msg, 'FATAL', true);
}

/**
* 打印warning日志
* @param string $msg 日志信息
*/
public static function warn($msg){
self::write($msg, 'WARN', true);
}

/**
* 打印notice日志
* @param string $msg 日志信息
*/
public static function notice($msg){
self::write($msg, 'NOTICE');
}

/**
* 打印debug日志
* @param string $msg 日志信息
*/
public static function debug($msg){
self::write($msg, 'DEBUG');
}

/**
* 打印sql日志
* @param string $msg 日志信息
*/
public static function sql($msg){
self::write($msg, 'SQL');
}
}

/**
* ExtException类，记录额外的异常信息
*/
class ExtException extends Exception{
/**
* @var array
*/
protected $extra;

/**
* @param string $message
* @param array $extra
* @param int $code
* @param null $previous
*/
public function __construct($message = "", $extra = array(), $code = 0, $previous = null){
$this->extra = $extra;
parent::__construct($message, $code, $previous);
}

/**
* 获取额外的异常信息
* @return array
*/
public function getExtra(){
return $this->extra;
}
}