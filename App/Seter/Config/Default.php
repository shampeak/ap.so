<?php
//if ( ! defined('SHAM_PATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
|  SETTINGS
| -------------------------------------------------------------------
| the active record class
*/

$config = [
    'RDBC'=>'',
    'debug'=>true,
    //对现有的路由进行映射
    'Geter'=>[
        'Base'=> '../G/',
        'FW' => [
            'user',
            'sys',
            'Table',
        ],
    ],

    //依赖注入的组件
    'obj'=>[
        [
            'classname'=>'db',
            'class'=>'\Seter\Library\SDb',
            'parm'=>'',
        ],
        [
            'classname'=>'gpdo',
            'class'=>'\Seter\Library\Gpdo',
            'parm'=>'',
        ],

        [
            'classname'=>'table',
            'class'=>'\Seter\Library\Table',
            'parm'=>'',
        ],
        [
            'classname'=>'model',
            'class'=>'\Seter\Library\Model',
            'parm'=>'',
        ],
        [
            'classname'=>'request',
            'class'=>'\Seter\Library\Request',
            'parm'=>'',
        ],
        [
            'classname'=>'user',
            'class'=>'\Seter\Library\User',
            'parm'=>'',
        ],
        [
            'classname'=>'rbac',
            'class'=>'\Seter\Library\Rbac',
            'parm'=>'',
        ],

//        [
//            'classname'=>'doc',
//            'class'=>'\Seter\Library\Doc',
//            'parm'=>'',
//        ],
//        [
//        [
//            'classname'=>'mdb',
//            'class'=>'\Seter\Library\Mdb',
//            'parm'=>'',
//        ],
//        [
//            'classname'=>'router',
//            'class'=>'\Seter\Library\Router',
//            'parm'=>'',
//        ],

    ]
];

return $config;
