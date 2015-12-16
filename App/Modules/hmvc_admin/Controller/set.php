<?php

namespace Controller;

/**
 * ?  “访客”
 * @  “已授权“
 */


class set extends BaseController {

      public function doIndex(){
            //echo 主界面
            view();
      }

      public function doGeter_BoxPost()
      {
            $id = bus('post')['id'];
            $des = bus('post')['des'];

            sapp('SQLite')->update('geter','des',$des,'id',intval($id));
            echo json_encode([
                'code'=> 200,
                'msg' => '-'
            ]);
      }

      public function doGeter_Box($param)
      {
            $sql = "select * from geter where id = ".intval($param);
            $res = sapp('SQLite')->getrow($sql);
            view('',[
                      'res'=>$res
                ]);
      }

      public function doGeter_Ed($param)
      {
            $sql = "select active from geter where id = ".intval($param);
            $st = sapp('SQLite')->getone($sql);
            $newactive = $st?0:1;

            sapp('SQLite')->update('geter','active',$newactive,'id',intval($param));


            echo json_encode([
                  'code'=> 200,
                  'msg' => '-'
            ]);
      }

      public function doGeterPost()
      {
            $list = bus('post')['s'];
            foreach($list as $key=>$value){
                  $value = intval($value);
                  sapp('SQLite')->update('geter','sort',$value,'id',$key);
            }
            R('/admin/set/geter/');
      }

      public function doGeter(){
            $where = 1;
            //去除无效的
            if($_COOKIE['set_get_list']){
                  $where .= " and active != 0";
            }

            $sql = "select * from geter where $where order by sort desc";
            $res = sapp('SQLite')->getall($sql);

            view('',[
                  'res' => $res
            ]);
      }


      public function doMcae(){
            //echo 主界面
            view();
      }

      public function doMcae_menu(){
            //echo 主界面
            view();
      }

      public function doMiddleware(){
            //echo 主界面
            view();
      }

      public function doWidget(){
            //echo 主界面
            view();
      }


}




