<?php

namespace Seter\Library;

class Request{
    public static $instance;

    public function __construct(){}
    public function post(){
        return $_POST;
    }

    public function get(){
        $router = C('Router');
        $parms = isset($router['params'])?$router['params']:[];
        return $parms;
    }

    public function env(){
        $env['START_TIME'] = START_TIME;
        $env['START_MEMORY_USAGE'] = START_MEMORY_USAGE;
        $env['EXT'] = EXT;
        $env['DS'] = DS;
        $env['SP'] =SP;
        $env['AJAX_REQUEST'] = AJAX_REQUEST;
        $env['DOMAIN'] = DOMAIN;
        $env['PATH'] = PATH;
        return $env;
    }

    public function cookie(){
        return $_COOKIE;
    }

    public function __get($name){
        return $this->$name();
    }

    //=======================================
    //=======================================
}

