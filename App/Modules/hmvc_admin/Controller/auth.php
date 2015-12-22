<?php

namespace Controller;

/**
 * ?  “访客”
 * @  “已授权“
 */


class auth extends BaseController {

      public function doLoginPOST(){
            echo json_encode([
                'code'  => 200,
                'msg'   => '未完成',
            ]);
      }

      public function doIndex(){
            R('/admin/auth/login');
      }

      public function doLogin(){
            //echo 主界面
            view();
      }

      public function doLogout(){
            R('/admin/auth/login/');
      }

}




