<?php


/**
 * ?  “访客”
 * @  “已授权“
 */
class user extends BaseController {

    public function doRegister(){
        $username   = $this->request->post['username'];
        $pwd        = $this->request->post['pwd'];

        $_march = '/[^A-Za-z0-9]/';             //如果发现字母数字意外的字符 报错
        if(preg_match($_march, $username)) {
            St::J(-200,'用户名非法，请重新输入正确的用户名');
        }
        //密码长度
        if(strlen($pwd)<6) {
            St::J(-200,'密码长度不够,最少6位');
        }

        //判断是否重复
        $row = $this->table->dy_user->where("uname = '$username'")->getrow();
        if(!empty($row)){
            St::J(-200,'用户名已经存在');
        }

        //ok 监测通过
        $res['uname'] = $username;
        $res['pwd'] = $pwd;
        $res['groupid'] = 999;
        $res['regtime'] = T();
        $res['enable'] = 1;
        $this->table->dy_user->insert($res);
        St::J(200,'用户添加完成');
    }


}
