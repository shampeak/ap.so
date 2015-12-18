<?php

namespace Controller;

/**
 * ?  “访客”
 * @  “已授权“
 */


class set extends BaseController {

      public function doMcae(){
            $where = 1;
            //去除无效的
            if($_COOKIE['set_get_list']){
                  $where .= " and active != 0";
            }

            $sql = "select * from mcae where $where order by sort desc,id desc";
            $res = sapp('SQLite')->getall($sql);

            view('',[
                'res' => $res
            ]);
      }

      public function doMcaePost()
      {
            $list = bus('post')['s'];
            foreach($list as $key=>$value){
                  $value = intval($value);
                  sapp('SQLite')->update('mcae','sort',$value,'id',$key);
            }
            R('/admin/set/mcae/');
      }


      public function doMcae_De($param)
      {
            $sql = "delete from mcae where id = ".intval($param);
            sapp('SQLite')->query($sql);
            echo json_encode([
                'code'=> 200,
                'msg' => '-'
            ]);
      }

      public function doMcae_BoxPost()
      {
            $id = bus('post')['id'];
            $des = bus('post')['des'];

            sapp('SQLite')->update('mcae','des',$des,'id',intval($id));
            echo json_encode([
                'code'=> 200,
                'msg' => '-'
            ]);
      }



      public function doMcae_Box($param)
      {
            $sql = "select * from mcae where id = ".intval($param);
            $res = sapp('SQLite')->getrow($sql);
            view('',[
                      'res'=>$res
                ]);
      }

      //更改状态
      public function doMcae_Ed($param)
      {
            $sql = "select active from mcae where id = ".intval($param);
            $st = sapp('SQLite')->getone($sql);
            $newactive = $st?0:1;

            sapp('SQLite')->update('mcae','active',$newactive,'id',intval($param));


            echo json_encode([
                  'code'=> 200,
                  'msg' => '-'
            ]);
      }






}




