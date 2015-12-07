<?php


/**
 * ?  “访客”
 * @  “已授权“
 */
class home extends BaseController {

    /**
     * 综合页
     */
    public function doIndex(){
//            $this->G('user.info.1');
//
//





        $this->display('',[
            'title' => '仪表盘',
            'dis'   => '显示系统的使用情况，和数据情况',
        ]);
    }

    public function doDashboard(){
        $this->display('',[
            'title'=>'主界面'
        ]);
    }









    public function doMain()
    {
//        echo $this->user->islogin();
//        echo $this->user->isguest();
//        D( $this->user->getuserinfo());
//        echo $this->user->isadmin();



        D(\Seter\Seter::getInstance()->request->cookie['vuser_uname']);
        $this->display('',[
            'title'=>'主界面'

        ]);
    }

    //退出登陆
    public function doSignout()
    {
        $this->model->UserModel->signout();
        $this->Redirect(C('userlogin'));
    }

    //denglu
    public function doLogin(){
        if($this->ispost){
            $this->model->UserModel->signin();
        }
        $this->display('',[
            'title'=>'登陆',
        ]);       //默认的index.php
    }
    //?ref=main.php

    //denglu
    public function doView(){
        $this->display('',[
            'title' => '查看',
            'dis'   => '说明'
        ]);       //默认的index.php
    }
    //?ref=main.php



}
