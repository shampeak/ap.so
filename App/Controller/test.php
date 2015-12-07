<?php
/**
 * Created by PhpStorm.
 * User: 123456
 * Date: 2015/7/17
 * Time: 11:16
 */

class test extends BaseController {

    public function doList_data()
    {
        $this->display('',[
            'title'=>'底层数据',
        ]);
    }

    public function doList_fun()
    {
        $this->display('',[
            'title'=>'底层函数',
        ]);
    }

    public function doList_obj()
    {
        $this->display('',[
            'title'=>'对象',
        ]);
    }

    public function doList_ff()
    {
        $this->display('',[
            'title'=>'方法',
        ]);
    }

    public function doList_config()
    {
        $this->display('',[
            'title'=>'方法',
        ]);
    }


    public function doList()
    {
        $this->display('',[
            'title'=>'登陆',
        ]);       //默认的index.php
    }

//mark

    public function doD()
    {
        $this->display('',[
            'title'=>'登陆',
        ]);       //默认的index.php
    }


    public function doMain($param)
    {
        $this->display('',[]);
    }

}
