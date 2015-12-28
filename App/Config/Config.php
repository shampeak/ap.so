<?php

//直接引入的

return [

    /*
    |--------------------------------------------------------------------------
    | 调试开关
    | 1 : error_report 模式
    | 2 : Middleware 输出调试信息
    |--------------------------------------------------------------------------
    |
    */
    'debug'             => true,

    /*
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    error_reporting(E_ALL | E_PARSE);
    E_ALL ^ E_PARSE,
    */
    'error_reporting'      => E_ALL ^ E_NOTICE,
    'mcaroot'              => "admin.main.index",
    'pagesize'             => 10,



    /*
    |--------------------------------------------------------------------------
    | 执行环境参数
    |--------------------------------------------------------------------------
    |
    | 配置信息,访问 : Sham\Wise\Wise::getInstance()->_config
    |
    */
    'Env' => [
        //'APPROOT'           => '-',             //在入口进行定义 [这里只是占位]
        'WDS'               => DIRECTORY_SEPARATOR,

        /*
        |--------------------------------------------------------------------------
        | 时区
        |--------------------------------------------------------------------------
        | Asia/Shanghai – 上海
        | Asia/Chongqing – 重庆
        | Asia/Urumqi – 乌鲁木齐
        | Asia/Hong_Kong – 香港
        | Asia/Macao – 澳门
        | Asia/Taipei – 台北
        | Asia/Singapore – 新加坡
        | RPC - 中国
        |
        */
        'default_timezone'  => 'PRC',

        'charset'           => 'utf-8',         //编码说明


    ],

    /*
    |--------------------------------------------------------------------------
    | App相关定义
    |--------------------------------------------------------------------------
    |
    | 配置信息,访问 : Sham\Wise\Wise::getInstance()->_config
    |
    */
    'App' => [
        'default_controller'                => 'home',
        'default_controller_method'         => 'index',
        'default_controller_method_prefix'  => 'do',

        'error_page_404'    => 'error/error_404.php',
        'error_page_500'    => 'error/error_500.php',
        'error_page_msg'    => 'error/error_msg.php',
        'message_page_view' => 'error/error_view.php',
    ],

    /*
    |--------------------------------------------------------------------------
    | App /m模块定义
    |--------------------------------------------------------------------------
    |
    */
    'Modulelist' => [
        'doc'   => 'hmvc_doc',
        's'     => 'hmvc_s',
        'v'     => 'hmvc_v',
        'man'   => 'hmvc_man',
        'admin' => 'hmvc_admin',
    ],

    /*
    |--------------------------------------------------------------------------
    | 配置信息 用户相关的
    |--------------------------------------------------------------------------
    |
    | 配置信息,访问 : Sham\Wise\Wise::getInstance()->_config
    |
    */
    'Usertable'=>[
        'tablename' => 'dy_user',            //表名
        'field'=>[                          //字段设定 [ 在相关类中用到的 ]
            'userlogin'     => 'uname',
            'userpassword'  => 'pwd',
            'expire'        => 'expire',
            'active'        => 'active',
        ],
    ],

    //控制器扩展
    'ActionExt'=>[
        'box',          //标准对话框
        'delete',       //标准扩展,删除扩展
        'states',       //标准扩展,更改状态
        'dialog',       //标准扩展,更改状态
        'ext',          //标准一般扩展

        'ed',           //标准一般扩展
        'de',           //标准扩展
    ],

    /*
    |--------------------------------------------------------------------------
    | 用户中间件注册
    |--------------------------------------------------------------------------
    |
    | 配置信息,访问 : Sham\Wise\Wise::getInstance()->_config
    |
    */
    'Middleware' => [
        'authUser' => App\Middleware\User::class,
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

    //分页相关设置
    '_page' => [
            'pagesize'  => 10,
            'bbf'       => '<ul class="pagination pagination-sm no-margin pull-right">',
            'aaf'       => '</ul>',
            //开始符
            'bf'        => '<li><a href="{$url}">&laquo;</a></li>',
            'bfd'       => '<li class="disabled"><a href="#">&laquo;</a></li>',
            //结束符
            'af'        => '<li><a href="{$url}">&raquo;</a></li>',
            'afd'       => '<li class="disabled"><a href="#">&raquo;</a></li>',
            //导航
            'nav'       => '<li><a href="{$url}">{$page}</a></li>',
            'navactive' => '<li class="active"><a href="{$url}">{$page}</a></li>',
    ],

];



