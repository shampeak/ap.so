<?php

namespace Controller;

/**
 * ?  “访客”
 * @  “已授权“
 */


class set extends BaseController {



      public function doMenu($page = 1){

            $where = 1;
            //去除无效的
            if($_COOKIE['set_get_list']){
                  $where .= " and active != 0";
            }

            //先进行分页运算
            bus('page',Md([
                'url'         => '/admin/set/menu/{$page}',
                'page'        => $page,
                'count'       => sapp('SQLite')->getone("select count(*) from menu where $where"),
            ],[
                'ControllerPageMiddleware'      => \App\Middleware\ControllerPageMiddleware::class,         //初始化视图
            ]));
            $limit = bus('page')['limit'];

            $sql = "select * from menu where $where order by sort desc,id desc $limit";
            $res = sapp('SQLite')->getall($sql);
            //分页中间件
            view('',[
                  'res' => $res,
                  'page'=>bus('page'),
            ]);
      }

      public function doMenuPost()
      {
            $list = bus('post')['s'];
            foreach($list as $key=>$value){
                  $value = intval($value);
                  sapp('SQLite')->update('menu','sort',$value,'id',$key);
            }
            R('/admin/set/menu/');
      }


      public function doMenu_De($param)
      {
            $sql = "delete from menu where id = ".intval($param);
            sapp('SQLite')->query($sql);
            echo json_encode([
                'code'=> 200,
                'msg' => '-'
            ]);
      }

      public function doMenu_BoxPost()
      {
            $id   = bus('post')['id'];
            $des  = bus('post')['des'];
            $name = bus('post')['name'];
            $preid= bus('post')['preid'];
            $icon = bus('post')['icon'];

            sapp('SQLite')->query("update menu set name = '$name',des = '$des',preid='$preid',icon='$icon' where id = ".intval($id));

//            sapp('SQLite')->update('menu','des',$des,'id',intval($id));

            echo json_encode([
                'code'=> 200,
                'msg' => '-'
            ]);
      }



      public function doMenu_Box($param)
      {
            $sql = "select * from menu where id = ".intval($param);
            $res = sapp('SQLite')->getrow($sql);
            view('',[
                      'res'=>$res
                ]);
      }

      public function doMenu_Ext($param){
            $sql = "select ismenu from menu where id = ".intval($param);
            $st = sapp('SQLite')->getone($sql);
            $newactive = $st?0:1;
            sapp('SQLite')->update('menu','ismenu',$newactive,'id',intval($param));
            echo json_encode([
                'code'=> 200,
                'msg' => '-'
            ]);
      }

      //更改状态
      public function doMenu_Ed($param)
      {
            $sql = "select active from menu where id = ".intval($param);
            $st = sapp('SQLite')->getone($sql);
            $newactive = $st?0:1;

            sapp('SQLite')->update('menu','active',$newactive,'id',intval($param));


            echo json_encode([
                  'code'=> 200,
                  'msg' => '-'
            ]);
      }






}




