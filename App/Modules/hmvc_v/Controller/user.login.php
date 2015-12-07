<?php


/**
 * ?  “访客”
 * @  “已授权“
 */
class user extends BaseController {

    public function doLogin(){
        $username   = $this->request->post['username'];
        $pwd        = $this->request->post['pwd'];

        if (empty($username) || empty($pwd)) St::J(-100,'登陆失败');

        //=======================================
        $row = $this->table->dy_user->where("uname = '$username'")->getrow();

        //用户不存在
        if(empty($row)){
            St::J(200,'该用户不存在');
        }

        if($row['enable'] ==0){
            St::J(200,'该用户禁止登陆');
        }

        if($row['user_password'] != $pwd ){
            St::J(200,'密码不对');
        }

        //登陆成功的日志计算
        $mc['f_logintime'] 	= time();;
        $mc['f_loginip'] 	= Set::GetIP();
        $this->table->dy_user->where("uname = '$username'")->update($mc);

        //=======================================
        St::J(200,'登陆成功');
    }


}
