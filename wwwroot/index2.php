<?php
//---------------------------------------------------
//载入Sham\Wise

include("../Sham/Helper.php");
include("../vendor/autoload.php");
//---------------------------------------------------
define('APPROOT','../App/');
//function select($table,$name,$Conditionsname,$Conditionsvalue=null){

$res['module']    = '1';
$res['controller']= '2';
$res['action']    = '3';
$res['actionext'] = '4';
$res['mothed']    = '5';

$mc = sapp('SQLite')->insert('mcae',$res);

unset($res);
$res['module']    = '1';
$res['controller']= '2';
$mc = sapp('SQLite')->getall('select id,mothed from mcae');

//print_r($mc);
//      echo 'mark';

print_r($mc);

//App\Application::run();

//所有请求都请求道 Application::RUN 下面
