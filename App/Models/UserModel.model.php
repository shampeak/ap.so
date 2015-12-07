<?php

/**
 * 用户模型
 * 添加 ->signup($res)
 * 登陆 ->signin($res)
 * 登出 ->signout($res)
 *
 */
class UserModel extends Model
{

    //更改用户信息
    public function edit()
    {

        $this->S->user->edit($this->S->request->post);
        St::AjaxReturn();
    }

    //更改密码
    public function changepassword($parmas = array())
    {
        $this->S->user->changepassword($this->post['pwd'],$this->post['newpwd']);
        St::AjaxReturn();
    }

    //注册
    public function signup($parmas=array())
    {
        $res = [
            'uname' =>  $this->post['uname'],
            'pwd'   =>  $this->post['pwd'],
            'tname' =>  $this->post['tname'],
            'tel'   =>  $this->post['tel'],
        ];
        $this->S->user->signup($res);
        St::AjaxReturn();
    }


    //登陆
    public function signin($parmas=array())
    {
        //$dc = $this->S->user->signin($this->post['uname'],$this->post['pwd'])->json();            //查看操作json
        $this->S->user->signin($this->post['uname'],$this->post['pwd']);
        St::AjaxReturn();
    }


    //注销
    public function signout()
    {
        return $this->S->user->signout();
    }



//    public function __construct(){
//        parent::__construct();
//    }
//
//    public function _init()
//    {
//        $this->get = \Seter\Seter::getInstance()->request->get;
//        $this->post = \Seter\Seter::getInstance()->request->post;
//        $this->cookie = \Seter\Seter::getInstance()->request->cookie;
//    }
//
//    public function AjaxReturn()
//    {
//        echo json_encode($this->json);
//        exit;
//    }










//+=========================================================
//状态
//+=========================================================

    public function DefaultCoderes()
    {
        return [
            '0'     => 'ini',
            '200'   => '操作成功',
        ];
    }


}
