<?php

namespace G;
!defined('FAST_PATH') && die('out of app');


class Mg
{
    public  function __construct()
    {
        $this->db= \Seter\Seter::getInstance()->db;
        $this->table= \Seter\Seter::getInstance()->table;
    }

    public function index()
    {
    }
    public function show()
    {
        $lib =  get_class_methods($this);            //所有的方法
        $lib = array_diff($lib,['show','ds']);           //去掉show方法
        return $lib;
    }


}


