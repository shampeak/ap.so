<?php

namespace Controller;

/*
 * 对文章类别的管理
 */

class article extends BaseController {


      public function doIndexPost(){}

      //标准扩展
      //
      public function doIndex_Ed($param){}
      public function doIndex_De($param){}


      public function doIndex_Ext($param){
            echo 'view';
      }

      public function doIndex_DialogPost(){
//'login' 	: $('.dialoglogin').val(),
//'password' 	: $('.dialogpassword').val(),
//'group' 	: $('.dialoggroup').val(),
//'des' 		: $('.dialogdes').val(),
//'userid' 	: $('.dialogid').val(),

            $userid           = intval(bus('post')['userid']);
            $password         = bus('post')['password'];
            $rc['groupId']      = bus('post')['group'];
            $rc['des']        = bus('post')['des'];
            if($password)   $rc['password']  = shamhash($password);

            $rc = saddslashes($rc);
            sapp('db')->autoExecute('user',$rc,'UPDATE','userId = '.$userid);
            echo json_encode([
                'code'=> 200,
                'msg' => '-'
            ]);


      }

      public function doIndex_Dialog($param){
            $sql = "select * from user where userId = ".intval($param);
            $res = sapp('db')->getrow($sql);

            view('',[
                'res'=>$res,
                'group' => geter('group.KeyGroupidActiveTrue')
            ]);
      }

      public function doIndex_Delete($param){
            $sql = "delete from user where userId = ".intval($param);
            sapp('db')->query($sql);
            echo json_encode([
                'code'=> 200,
                'msg' => '-'
            ]);
      }

      public function doIndex_BoxPost(){
            $rc['login']      = bus('post')['login'];
            $rc['password']   = bus('post')['password'];
            $rc['groupId']    = intval(bus('post')['group']);
            $rc['des']        = bus('post')['des'];

            //addslashes()和stripslashes()

            //监测空值
            if(empty($rc['login']) || empty($rc['login'])){
                  echo json_encode([
                      'code'=> -200,
                      'msg' => '用户名或密码空'
                  ]);
                  exit;
            }


            //监测重复
            $login = saddslashes($rc['login']);
            $sql = "select count(*) from user where login = '{$login}'";
            $num = sapp('db')->getone($sql);
            if($num){
                  echo json_encode([
                      'code'=> -200,
                      'msg' => '该用户名存在'
                  ]);
                  exit;
            }

            //hash
            $rc['password'] = shamhash($rc['password']);
            //--------------------------------------------------------
            $rc = saddslashes($rc);
            sapp('db')->autoExecute('user',$rc,'INSERT');


            //--------------------------------------------------------
            echo json_encode([
                'code'=> 200,
                'msg' => '-'
            ]);
      }

      public function doIndex_States($param){
            $sql = "select active from user where userId = ".intval($param);
            $st = sapp('db')->getone($sql);
            $rc['active'] = $st?0:1;
            sapp('db')->autoExecute('user',$rc,'UPDATE','userId='.intval($param));
            echo json_encode([
                'code'=> 200,
                'msg' => '-'
            ]);
      }

      public function doIndex(){

            //ruleLib不再管理范围之内,交给专门的程序去处理
            $where = 1;						//去除无效的
            if($_COOKIE['set_get_list'])	$where .= " and user.active != 0";


            $res = sapp('db')->getall("	select user.* from user
									where $where
									order by user.userId desc
									");
            view('',[
                'res' => $res,
                'group' => geter('group.KeyGroupidActiveTrue')
            ]);

      }

}




