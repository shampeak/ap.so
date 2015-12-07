<?php
include("../App/Helper.php");
include("../vendor/autoload.php");
//---------------------------------------------------

//直接引入的

return [

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
//            'userlogin'     => 'userlogin',
//            'userpassword'  => 'userpassword',
//            'expire'        => 'expire',
//            'active'        => 'active',
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
    |
    | 配置信息,访问 : Sham\Wise\Wise::getInstance()->_config
    |
    */
    'Middleware' => [
        'auth' => App\Middleware\User::class,
    ],


    /*
    |--------------------------------------------------
    | 未启用配置 [ 预留着以后启用 替代之前的Conf.php ]
    |--------------------------------------------------
    |
    */
/*
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



