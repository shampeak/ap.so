<?php

//直接引入的

return [

    /*
    |--------------------------------------------------------------------------
    | 应用实体路径
    |--------------------------------------------------------------------------
    |
    */
    'APPROOT'           => '../App/',             //在入口进行定义 [这里只是占位]
    'WDS'               => DIRECTORY_SEPARATOR,
    'default_timezone'  => 'PRC',
    'charset'           => 'utf-8',
    'error_page_404'    => 'error/error_404.php',
    'error_page_500'    => 'error/error_500.php',
    'error_page_msg'    => 'error/error_msg.php',
    'message_page_view' => 'error/error_view.php',
    'default_controller'                => 'home',
    'default_controller_method'         => 'index',
    'default_controller_method_prefix'  => 'do',
    'debug'             => true,

    /*
    |--------------------------------------------------------------------------
    | 配置信息 用户相关的
    |--------------------------------------------------------------------------
    |
    | 配置信息,访问 : Sham\Wise\Wise::getInstance()->_config
    |
    */
    'user'=>[
        'tablename' => 'dy_user',            //表名
        'field'=>[                          //字段设定 [ 在相关类中用到的 ]
            'userlogin'     => 'uname',
            'userpassword'  => 'pwd',
            'expire'        => 'expire',
            'active'        => 'active',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | 中间件定义
    |--------------------------------------------------------------------------
    | 配置信息,访问 : Sham\Wise\Wise::getInstance()->_config
    | 对Router进行操作
    |
    */
    'RouterMiddleware' => [
        'auth' => App\Middleware\Router::class,
    ],


    /*
    |--------------------------------------------------------------------------
    | 中间件定义
    |--------------------------------------------------------------------------
    |
    | 配置信息,访问 : Sham\Wise\Wise::getInstance()->_config
    |
    */
    'Middleware' => [
        'auth' => App\Middleware\User::class,
    ],


    /*
    |--------------------------------------------------
    | Conf.php 原始配置
    |--------------------------------------------------
    |
    */
    //模块映射
    'modulelist' => [
        'doc'   => 'hmvc_doc',
        's'     => 'hmvc_s',
        'v'     => 'hmvc_v',
        'man'   => 'hmvc_man',
        'admin' => 'hmvc_admin',
    ],

    //控制器扩展
    'ActionExt'=>[
        'po',       //post  有post
        'ed',       //修改
        'cf',       //修改状态
        'de',       //删除
        'json',     // json
        'vf',       //显示
    ],






    /*
        //对现有的路由进行映射
        'Router'=>[
            'action_extend'=>[
                'ex','post','put','sotr',
            ],
            'ys' =>[
            ]
        ],
    */

];



