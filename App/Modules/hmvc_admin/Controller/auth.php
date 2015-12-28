<?php

namespace Controller;

/**
 * ?  “访客”
 * @  “已授权“
 */


class auth extends BaseController {

      //登录提交
      public function doLoginPOST(){


            $password   = bus('post')['password'];
            $userlogin  = bus('post')['userlogin'];

            $user = geter('user.login.'.$userlogin);

            if(empty($user)){
                  echo json_encode([
                      'code'  => -200,
                      'msg'   => '该用户不存在',
                  ]);
                  exit;
            }

            if(!$user['active']){
                  echo json_encode([
                      'code'  => -200,
                      'msg'   => '不是有效用户',
                  ]);
                  exit;
            }

            //成功记录数据进入cookie
            //记录信息
            $tm = time();
            $sccheck = shamhash($userlogin,$tm);

            sapp('cookies')->set('ulogin',  $userlogin);
            sapp('cookies')->set('utime',   $tm);
            sapp('cookies')->set('usec',     $sccheck);

            echo json_encode([
                'code'  => 200,
                'msg'   => 'ok',
            ]);
      }

      public function doIndex(){
            R('/admin/auth/login');
      }

      public function doLogin(){
            view();
      }

      public function doLogout(){
            sapp('cookies')->clear('ulogin');
            sapp('cookies')->clear('utime');
            sapp('cookies')->clear('usec');
            R('/admin/auth/login/');
      }

}




