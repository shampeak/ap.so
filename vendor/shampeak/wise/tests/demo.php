<?php

include("../src/Helper.php");
include("../vendor/autoload.php");




/*
 * 调试
//数据的调用
$de = sapp('geter');
$de->get('gs.demo.123');
//-----------------------------------------------------
//调试模式
$de->actions();       //返回出所有的方法
echo $de;
$de->demo();
$de();
//-----------------------------------------------------
 */



$bus = sapp('bus');
$bus['uuu'] = 9999999999;
print_r($bus->all());
$key = 'gs.demo.123';

//Sham\Vo\Vo::getInstance()->make('geter')->get($key);
$ms = geter('gs.demo.123');
echo '<br>';
print_r($ms);
echo '<br>';

exit;


//$db =  sapp('Db');
//print_r($db());

//    //手动添加相对应的配置
//    $config = [
//        'afds'=>'adsffsdafdsa',
//        'afds1'=>'adsffsdafdsa',
//        'afds2'=>'adsffsdafdsa',
//        'afds3'=>'adsffsdafdsa',
//        'afds4'=>'adsffsdafdsa',
//    ];
//    //设置初始参数
//    $c = sc($config);
//    print_r(sc());
//    exit;



/*
//返回所有的服务列表
//print_r(Sham\Vo\Vo::getInstance());
//var_dump(Sham\Vo\Vo::getInstance()->make('db'));          //单例访问 [实例化]
 * Vo 的对象示例
* 配置文件直接读取print_r(Sham\Vo\Vo::getInstance()->ObjectConfig['Db']);
* var_dump(Sham\Vo\Vo::getInstance()->instances); //建立的对象 初始为空
* Sham\Vo\Vo::getInstance()->make('db')->test();
* //var_dump($vo);
*/

/*
    |--------------------------------------------------------------------------
    | 通用方法规划和设置
    |--------------------------------------------------------------------------
    | 1 : actions()         返回出所有的方法
    | 2 : __invoke          直接返回配置信息
    | 3 : __toString        echo 直接输出剪短说明
    | 4 : demo              没有输出,里面有对对象的描述
    |
*/




/*
//db对象调用
//print_r(sapp('db')->actions());

$res = sapp('db')->getrow('select * from dz_users');
$res = sapp('db')->getone('select login from dz_users');
$res = sapp('db')->getcol('select login from dz_users');
$res = sapp('db')->getall('select * from dz_users');
$res = sapp('db')->getmap('select login,firstName from dz_users');

print_r(sapp('db')->queryLog);     //sql语句日志
print_r(sapp('db')->queryCount);   //查询次数
print_r(sapp('db')->retemp);       //gsql 结果暂存
$insertid = sapp('db')->insert_id();
$version = sapp('db')->version();
sapp('db')->close();

//sapp('db')->autoExecute($table, $field_values, $mode = 'INSERT', $where = '', $querymode = '');
print_r($res);

exit;

*/


