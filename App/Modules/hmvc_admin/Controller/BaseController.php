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

    //ControllerBefore
    public function middlewareBefore(){
        return [
            'Init'    => \Controller\Middleware\Init::class,
        ];
    }


} 
