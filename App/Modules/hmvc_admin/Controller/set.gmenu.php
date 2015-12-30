<?php

namespace Controller;

/**
 * ?  “访客”
 * @  “已授权“
 */


class set extends BaseController {


      public function doGmenuPOST($groupid = 0)
      {
            sapp('SQLite')->query("delete from RBAC_group_mca where groupid = $groupid");
            //echo $groupid;
            //D(bus('post')['menuid']);
            //更改RBAC_group_mca 信息               -- 删除 添加
            $menuid = bus('post')['menuid']?serialize(bus('post')['menuid']):serialize([]);
            sapp('SQLite')->insert('RBAC_group_mca',[
                'groupid'     => intval($groupid),
                'menuid'      => $menuid,
            ]);
            R('/admin/set/gmenu/'.$groupid);
      }

      public function doGmenu($groupid = 0){
            $groupid = intval($groupid);
            $where = 1;
            if($groupid){
                  $where .= " and groupid = $groupid";
            }
            //先进行分页运算
            /*
             * 1 用户组列表
             * 2 该用户组的权限
             *
             */
            $res = sapp('SQLite')->getone("select menuid from RBAC_group_mca where $where order by id desc");
            $res = $res?unserialize($res):[];               //反序列号

            //分页中间件
            view('',[
                'grouplist'   => sapp('db')->getall("SELECT * FROM user_group"),
                'groupid'     => $groupid,
                'groupmenu'   => $res,
                'menulist'    => $groupid?sapp('SQLite')->getall("select * from menu where active = 1 order by sort desc,id desc"):[],
                'page'        => bus('page'),
            ]);
      }




}




