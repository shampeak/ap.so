<?php
/**
 * modules 可以在这里设置，并且覆盖前面的设置
 */

$config = [
    'error_manage' => '',
    'APP_PATH' => '../App213/',
    //缓存路径
    'Cacheroot' => C('APP_PATH').'cache/',

    //'application_folder' => dirname(__FILE__),

    //入口系统模块 - hmvc必须
    'modulelist' => [
        'doc'   => 'hmvc_doc',
        's'     => 'hmvc_s',
        'v'     => 'hmvc_v',
        'man'     => 'hmvc_man',
        'admin'     => 'hmvc_admin',
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

    'mysql'=>[
//        'default'=>[
//            "hostname"  =>  'rdsoyq134we31od4l8uwi.mysql.rds.aliyuncs.com',
//            "username"  =>  'nsv1',
//            "password"  =>  'nsv1nsv1',
//            "database"  =>  'rvfjbvj6il30zoiq',
//            "charset"   =>  'utf8',
//            "pconnect"  =>  0,
//            "quiet"     =>  0
//        ],
        'default'=>[
//            "hostname"  =>  '58.30.248.98',
            "hostname"  =>  '127.0.0.1',
            "username"  =>  'gracemain',
            "password"  =>  'gracemain',
            "database"  =>  'gracemain',

            "charset"   =>  'utf8',
            "pconnect"  =>  0,
            "quiet"     =>  0
        ],
    ],

    //rbac相关设置
    'Rbacdb'=>[
        'accessrules'   =>'g_accessrules',
        'accessrules_lib'=>'g_rulelib',
    ],

    'usertablename' => 'dy_user',                   //用户表

    'User'=> [
        'tablename'=> 'dy_user',                    //用户表名
        'AdminGroupid'=>[9,0],
        'UserField'=> [
//        'tablename'   => 'dy_user',
//        'uid'         => 'uid',
//        'fileduname'  => 'uname',
//        'filedtname'  => 'tname',
//        'filedpwd'    => 'pwd',
//        'filedauthkey'=> 'authkey',
//        'filedgroupid'=> 'groupid',
//        'filedenable' => 'enable',
//        'filedaccessToken' => 'accessToken',
//        'filedloginip' => 'logip',
//        'filedlogintm' => 'logtime',
//        'filedregtime' => 'regtime',
        ]
    ],

    //对现有的路由进行映射
    'Router'=>[
        'action_extend'=>[
            'ex','post','put','sotr',
        ],
        'ys' =>[
        ]
    ],

];

unset($config['APP_PATH']);     //这两个路径的配置被终止

return $config;
