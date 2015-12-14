<?php

namespace Controller;

use Sham\View\View;

class home extends BaseController {

    public function __construct(){
        parent::__construct();
    }
    //根据情况进行跳转
    public function doIndex(){

//halt('test');
        View('index',[

        ]);

        require('asdf.htm');
//        W('index.htm',[
//            'username'=>'alice'
//        ]);





        exit;
//        D(bus());

        /*
        |----------------------------------------------------------------
        |
        */
        //

//        //前端模板操作
//        View::display('index',[
//            'dt' => '12'
//        ]);
//
//        $ms = View::fetch('index',[
//            'dt' => '12'
//        ]);
//
//        View::assign('index',[
//            'dt' => '12'
//        ]);



//        //前端部件
//        W::assign('index',[
//            'dt' => '12'
//        ]);



    }

}
