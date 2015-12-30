<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/1 0001
 * Time: 19:47
 */

namespace App\Geter;


class Menu
{

    public function menu()
    {
        /*
         *  当前bus
            [mc] => admin.user
            [mca] => admin.user.group
            [mcaet] => admin.user.group.N.GET
            [mcaroot] => admin.main.index
         */
        $mca = bus('mca');
        //检索当前mca 的id
        $mcaid    = sapp('SQLite')->getrow("select * from menu where mca = '$mca'");
        $idlib = $mcaid?[$mcaid['id'],$mcaid['preid']]:[];              //对active 进行标记

        //================================================================
        //检索出所有的
        $menu    = sapp('SQLite')->getall("select * from menu where ismenu = 1 order by sort desc,id desc");

        //要根据我的部门进行检索 - 我的部门信息

        //添加active状态
        foreach($menu as $key=>$value){
            //--------------------------------------------
            if(in_array($value['id'],$idlib)){
                $menu[$key]['actived'] = 1;
            }
        }

        //检索出主菜单
        foreach($menu as $key=>$value){
            if($value['preid'] == 0) $_menu[] = $value;
            $temp[$value['preid']][] = $value;      //中间变量
        }

        //添加child
        foreach($_menu as $key=>$value){
            $_menu[$key]['child'] = $temp[$value['id']]?:[];
        }
        //--------------------------------------------
        //计算路径
        return $_menu;
    }


    public function mypath()
    {
        $mca = $this->mymca();
        if($mca['parent']){
            $res['name']    = $mca['parent']['title'];
            $res['url']     = $mca['parent']['url'];
            $res['icon']    = $mca['parent']['icon'];
            $res['mca']     = $mca['parent']['mca'];
            $path[] = $res;
        }
        $res['name']    = $mca['title'];
        $res['url']     = $mca['url'];
        $res['icon']    = $mca['icon'];
        $res['mca']     = $mca['mca'];
        $path[] = $res;
        return $path;

    }


    //根据当前的menu配置和当前的mca 获得mca信息和path信息
    public function mymca()
    {

        $mca = bus('mca');
        //检索当前mca 的id
        $mymca    = sapp('SQLite')->getrow("select * from menu where mca = '$mca'");
        $preid = intval($mymca['preid']);
        if($preid){
            $mymca['parent'] = sapp('SQLite')->getrow("select * from menu where id = $preid");
        }
        return $mymca;
    }

}