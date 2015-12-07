<?php
/**
 * modules 可以在这里设置，并且覆盖前面的设置
 */

$config = [
    'mysql'=>[

        'default'=>[
            "hostname"  =>  '127.0.0.1',
            "username"  =>  'gracemain',
            "password"  =>  'gracemain',
            "database"  =>  'gracemain',

            "charset"   =>  'utf8',
            "pconnect"  =>  0,
            "quiet"     =>  0
        ],

        'db1'=>[
            "hostname"  =>  '127.0.0.1',
            "username"  =>  'gracemain',
            "password"  =>  'gracemain',
            "database"  =>  'gracemain',

            "charset"   =>  'utf8',
            "pconnect"  =>  0,
            "quiet"     =>  0
        ],
    ],


    //根据tablename 和 action
    //分库
    'fk'=>[
        'db1' =>[
            'dyuser'=> ['S','u','d','i'],
        ],
        'db2' =>[
            'dyuser'=> ['S','u','d','i'],
        ],
    ],

];

return $config;
