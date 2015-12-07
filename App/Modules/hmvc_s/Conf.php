<?php
/**
 * modules 可以在这里设置，并且覆盖前面的设置
 */

$config = [
    'userlogin' => '/s/home/login',
    'usermain' => '/s/home/main',

    'error_manage'=>'123',
//    'application_folder' => dirname(__FILE__),
    //入口系统模块 - hmvc必须

    'ActionExt'=>[
        'po',       //post  有post
        'ed',       //修改
        'cf',       //修改状态
        'de',       //删除
        'json',     // json
        'vf',       //显示
    ],


];
return $config;


/**
 * 这三个配置会不起作用
 */
//    APP_PATH
//    modules
//    router
