<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/1 0001
 * Time: 19:47
 */

namespace App\Geter;


class Group
{
      /*
      |--------------------------------------------------
      | 数据接口列表
      |--------------------------------------------------
      | user.all        //用户组列表
      | user.id.num     //根据id
      | user.chr.chr  //根据chr
      |
      */

      private $res = array(); //数据结果集

      //返回所有的用户
      public function all()
      {

            $sql = "select * from user_group order by sort desc";
            $this->res = sapp('db')->getall($sql);
            return $this->res;
      }

      //根据id返回用户
      public function id($groupid = 0)
      {
            $sql = "select * from user_group WHERE groupId = $groupid";
            return sapp('db')->getrow($sql);
      }

      //根据login返回用户
      public function chr($groupchr = '')
      {
            $sql = "select * from user_group WHERE groupchr = $groupchr";
            return sapp('db')->getrow($sql);
      }

      public function iscache(){

      }

      public function setcache(){

      }

      public function getcache(){

      }


}
