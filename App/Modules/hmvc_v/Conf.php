<?php
/**
 * modules 可以在这里设置，并且覆盖前面的设置
 */

$config = [
    'userlogin' => '/s/home/login',
    'usermain' => '/s/home/main',

    'error_page_404'    => 'error/error_404.php',
    'error_page_500'    => 'error/error_500.php',
    'error_page_msg'     => 'error/error_msg.php',

    'error_manage'=>'123',
//    'application_folder' => dirname(__FILE__),
    //入口系统模块 - hmvc必须
];
return $config;


/**
 * 这三个配置会不起作用
 */
//    APP_PATH
//    modules
//    router
