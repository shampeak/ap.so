<?php

namespace Controller;

use Grace\ControllerAbs;

//hook
class BaseController extends ControllerAbs{

    public function __construct()
    {
        parent::__construct();
        header('Content-Type: text/html; charset=utf-8'); //网页编码
    }

//    //ControllerBefore
    public function middlewareBefore(){
        return [
            'Menu'    => \Controller\Middleware\Menu::class,
            'Init'    => \Controller\Middleware\Init::class,
        ];
    }
//

//    //ControllerBefore
//    public function middlewareAfter(){
//        return [
//            //'Init'    => \Controller\Middleware\Init::class,
//        ];
//    }
//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'only' => [],                         //行为限定
//                'rules' => [
//                    [
//                        'actions' => [],              //行为限定
//                        'allow' => true,              //判定
//                        'roles' => ['G'],
//                    ],
//                ],
//            ],
//        ];
//    }

} 
