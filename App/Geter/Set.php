<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/1 0001
 * Time: 19:47
 */

namespace App\Geter;


class Set
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
      public function geter()
      {
            $res = sapp('SQLite')->getall("select * from geter order by sort desc");
            return $res;
      }

      //返回所有的用户
      public function E500()
      {
            $file = bus('root').bus('app')['error_page_500'];
            includeIfExist($file);
            exit;
      }



}
