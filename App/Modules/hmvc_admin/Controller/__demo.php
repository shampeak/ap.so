<?php

namespace Controller;

/**
 * ?  “访客”
 * @  “已授权“
 *
 * access_token 	获取到的凭证
expires_in 	凭证有效时间，单位：秒
 *
 */

class home extends BaseController {

      public function doIndex_DePost()
      {
            View('index',[]);
            D(bus());

      }

      public function doIndex(){
//            View('index',[]);
//            sapp('ap')->Middleware([
//                'mdflit'    => \Controller\Middleware\mdflit::class,         //初始化视图
//            ]);
//
//            D(bus());
//            D(bus());
//          echo '--ede';
        //=======================================
        //print_r(bus(['user','modules']));     //获取bus信息
//               print_r(sc());
//
//
//        print_r(geter('user.all'));
//        print_r(geter('group.id.1'));

//        $userlogin = 'irones';
//        $logintime = 11111111111;
//        $sccheck = shamhash($userlogin,$logintime);
//        sapp('cookies')->set('userlogin',$userlogin);
//        sapp('cookies')->set('logintime',$logintime);
//        sapp('cookies')->set('sccheck',$sccheck);

//        print_r(bus());
//        print_r(sc());

         /*
         |----------------------------------------------------------
         | //三段参数
         | //1 : sc 系统配置的 config + struct + 原先的C()
         | //2 : vc 对象配置信息
         | //3 : bus 信息bus 包括
         | 值:
         | modules
         | controller
         | method
         | ext
         |
         | 数据仓库
         | router =>    [
                              [method_modules]  => admin
                              [method_controller] => home
                              [method_action]   => index
                              [method_action_ext] =>
                              [methodtype]      => GET
                              [ActionPrefix]    => do
                              [param]           =>
                              [params]          => Array()
                              [Action]          => doIndex
                              [ActionExt]       => doIndex
                              [tpl]             => index
                              [Appbase]         => ../App/Modules/hmvc_admin/
                        ]
         |
         | [user]       => Array()
         | [usergroup]  => Array()
         | [userrulelib]=> Array()
         | [menu]       => Array()
         | [page]       => Array()
         | [rules]      => Array()
         | [app]        => Array()
         | [req]        =>    [
                                    [get]       => Array()
                                    [post]      => Array()
                                    [cookies]   => Array()
                                    [session]   => Array()
                                    [server]    => Array()

                              ]
         |
         | print_r(bus());
         | ----------------------------------------------------------
         */

//
//          exit;
//        //print_r(geter('user.all'));
//
//        //ok
//        ap()->md([
//            'd'=>'md',
//        ])->go('v1');
    }

}




