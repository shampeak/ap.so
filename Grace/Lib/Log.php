<?php
/**
* ��־��
* ʹ�÷�����Log::fatal('error msg');
* ����·��Ϊ App/Log��������
* fatal��warning���¼��.log.wf�ļ���
*/
class Log{
/**
* ����־��֧��SAE����
* @param string $msg ��־����
* @param string $level ��־�ȼ�
* @param bool $wf �Ƿ�Ϊ������־
*/
public static function write($msg, $level='DEBUG', $wf=false){
//        if(function_exists('sae_debug')){ //�����SAE����ʹ��sae_debug��������־
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
* ��ӡfatal��־
* @param string $msg ��־��Ϣ
*/
public static function fatal($msg){
self::write($msg, 'FATAL', true);
}

/**
* ��ӡwarning��־
* @param string $msg ��־��Ϣ
*/
public static function warn($msg){
self::write($msg, 'WARN', true);
}

/**
* ��ӡnotice��־
* @param string $msg ��־��Ϣ
*/
public static function notice($msg){
self::write($msg, 'NOTICE');
}

/**
* ��ӡdebug��־
* @param string $msg ��־��Ϣ
*/
public static function debug($msg){
self::write($msg, 'DEBUG');
}

/**
* ��ӡsql��־
* @param string $msg ��־��Ϣ
*/
public static function sql($msg){
self::write($msg, 'SQL');
}
}

/**
* ExtException�࣬��¼������쳣��Ϣ
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
* ��ȡ������쳣��Ϣ
* @return array
*/
public function getExtra(){
return $this->extra;
}
}