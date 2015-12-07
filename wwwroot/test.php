<?php
// 定义 BASE_PATH

define('BASE_PATH', __DIR__);

// Autoload 自动载入

require BASE_PATH.'/../vendor/autoload.php';


//$md = new \App\Lib\test();
//
//echo 12;


$e = [
    'c' => 'controllers',
    'a' => 'action',
    'm' => 'mothed'
];

echo '<pre>';
print_r($e);
$o = arrayToObject($e);
echo $o->c;


//function arrayToObject($e){
//      if( gettype($e)!='array' ) return;
//      foreach($e as $k=>$v){
//            if( gettype($v)=='array' || getType($v)=='object' )
//                  $e[$k]=(object)arrayToObject($v);
//      }
//      return (object)$e;
//}
//
//
//
//
//
//function objectToArray($e){
//      $e=(array)$e;
//      foreach($e as $k=>$v){
//            if( gettype($v)=='resource' ) return;
//            if( gettype($v)=='object' || gettype($v)=='array' )
//                  $e[$k]=(array)objectToArray($v);
//      }
//      return $e;
//}












