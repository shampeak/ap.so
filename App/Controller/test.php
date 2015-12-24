<?php

namespace Controller;

use Sham\View\View;



class test extends BaseController {

    public function __construct(){
        parent::__construct();
    }
    //根据情况进行跳转
    public function doIndex(){

        echo 'get a token';




exit;







        //根据
        //appid / secret / deviceId / userId / timestamp / nonce
        //根据这些信息计算获取一个token
        //opensec = 'kasksakkdsfkfd'        //第一层       //多层加密

        /*
         * 二次记录
         * 1 : 获取参数
         * 2 : 根据参数计算出token
         * - : 删除原来的token       //保证该token是唯一的
         * 3 : 写入数据库
         * 4 : 返回该token
        */


//        View('index',[]);

        /*
        |-----------------------------------------------------
        | 对各部分进行测试和演示
        |-----------------------------------------------------
        | 中间件
        | 数据流
        | wideget
        | 前端
        | Geter
        */
        //中间件


//          right_content_head
//          right_content_info
//          right_content_box
//          right_content_footer




//          W('right_content_footer',[]);

//          //界面头部 头部
//          W('head',[]);

//          //左侧
//          W('left',[]);

//        geter('e.e404');
//halt('test');

//          echo 'mark';
//
//          exit;

//        require('asdf.htm');
//        W('index.htm',[
//            'username'=>'alice'
//        ]);

//        View('test',[
//            'dt' => '12'
//        ]);




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

    public function doGet()
    {
        $geterlist = [
//            'e.e404',
//            'e.e500',
            'group.all',
            'group.id.1',
            'group.chr.2',
            'user.info',
            'user.group',
            'user.rulelib',
            'user.cookies',
            'user.all',
            'user.id.1',
            'user.login.1',
        ];

        foreach($geterlist as $key){
            geter($key);
        }
    }


}
