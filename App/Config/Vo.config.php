<?php
    /*
    |--------------------------------------------------------------------------
    | 文件配置信息
    |--------------------------------------------------------------------------
    |
    | 配置信息在文件中,访问 : Sham\Wise\Wise::getInstance()->ObjectConfig
    | 格式,对象名首字母大写
    */

return [

    /*
    |--------------------------------------------------------------------------
    | 配置信息映射
    |--------------------------------------------------------------------------
    |
    | 配置信息在文件中,访问 :
    | 格式,对象名首字母大写
    */

    'FileReflect'    => [
        'Db'        => '../App/Config/Db.php',         //Mysql对象的
        'Geter'     => '../App/Config/Geter.php',      //cache对象的
        'Struct'    => '../App/Config/Struct.php',      //cache对象的
        'Cookies'   => '../App/Config/Cookies.php',      //cache对象的
        'Ap'        => '../App/Config/Ap.php',      //cache对象的
        'Mmc'       => '../App/Config/Mmc.php',      //cache对象的
//        'Dbr'    => '../SApp/Config/Dbr.php',         //Mysql对象的
//        'Cache' => '../SApp/Config/Cache.php',      //cache对象的
    ],

    /*
    |--------------------------------------------------------------------------
    | 类文件的映射
    |--------------------------------------------------------------------------
    |
    | 配置信息在文件中,访问 : Sham\Wise\Wise::getInstance()->ObjectConfig
    | 格式,对象名首字母大写
    */

    'Providers'=>[
        'Db'        => Sham\Db\Db::class,
        'Geter'     => Sham\Geter\Geter::class,
        'Req'     => Sham\Req\Req::class,
        'Bus'     => Sham\Bus\Bus::class,
        'Struct'     => Sham\Struct\Struct::class,
        'Cookies'     => Sham\Cookies\Cookies::class,
        'Ap'     => Sham\Ap\Ap::class,
        'Mmc'     => Sham\Mmc\Mmc::class,
    ],


];

