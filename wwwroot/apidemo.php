<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/21 0021
 * Time: 10:47
 */

//$file_contents = file_get_content('http://localhost/operate.php?act=get_user_list&type=json')

//POST方式得用下面的(需要开启PHP curl支持)。
$url = 'http://localhost/operate.php?act=get_user_list&type=json';
$ch = curl_init ();












 ( $ch, CURLOPT_URL, $url );
curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 10 );
curl_setopt ( $ch, CURLOPT_POST, 1 ); //启用POST提交
$file_contents = curl_exec ( $ch );
curl_close ( $ch );