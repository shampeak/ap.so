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


    /*
    |--------------------------------------------------
    | 用户数据库中的信息
    |--------------------------------------------------
    |
    */
    //原始信息输出
    private function menumy()
    {
        //return config('menulib');
    }

    private function menulib()
    {
        return config('menulib');
    }

    public function menu()
    {
        $menulib = $this->menulib();

        //--------------------------------------------
        //检查father
        $_menulib = array();
        foreach($menulib as $key=>$value){
            //--------------------------------------------
            $value['url'] = $this->mca2path($value['mca']);
            if($value['ismenu']){
                $_menulib[] = $value;
            }
        }
        //OK父目录检查完毕

        //--------------------------------------------
        //检查child
        foreach($_menulib as $key=>$value){
            $_child = array();

            $child = $value['child'];
            if(is_array($child)){
                unset($_cme);
                foreach($child as $k=>$v){
                    $v['mcap'] = $value['mca'];
                    $v['url'] = $this->mca2path($v['mca']);
                    if($v['ismenu'])$_child[] = $v;
                }
            }
            $_menulib[$key]['child'] = $_child;
        }

        //--------------------------------------------
        //计算路径
        return $_menulib;
    }
    public function mypath()
    {
        $mca = $this->mymca();
        if($mca['parant']){
            $res['name']    = $mca['parant']['title'];
            $res['url']     = $mca['parant']['url'];
            $res['icon']    = $mca['parant']['icon'];
            $res['mca']     = $mca['parant']['mca'];
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
        $mcalib = $this->mcalib();
        //当前的
        $mymca = $mcalib[bus('mca')];
        $mymca['parant'] = $mcalib[$mymca['mcap']];
        return $mymca;
    }

    //根据当前的menu配置和当前的mca 获得mca信息和path信息
    private function mcalib()
    {
        $menulib = $this->menulib();
        $res = array();
        foreach($menulib as $key=>$value){

            if(is_array($value['child'])){
                foreach($value['child'] as $k =>$v){
                    $v['mcap'] = $value['mca'];
                    $v['url'] = $this->mca2path($v['mca']);
                    $res[$v['mca']] = $v;
                }
            }
            unset($value['child']);
            $value['url'] = $this->mca2path($value['mca']);
            $res[$value['mca']] = $value;
        }
        //当前的
        return $res;
    }


    //根据当前的menu配置和当前的mca 获得mca信息和path信息
    private function mca2path($mca = '')
    {
        if(!$mca) return '';
        $list = explode('.',$mca);
        foreach($list as $key=>$value){
            if($value == 'N'){
                unset($list[$key]);
            }
        }
        $path = '/'.implode('/',$list).'/';
        //当前的
        return $path;
    }


}