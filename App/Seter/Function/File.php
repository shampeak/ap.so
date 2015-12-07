<?php
/*
 * 调用
 * include('Seter/I.php');			//入口代码
 * $this->Seter = new \Seter\Seter();
 * \Seter\Seter::getInstance()
 * */
namespace F;

class File
{
    /**
     * 禁止实例化
     */
    private  function __construct(){}

    public static function test()
    {
        echo 'test:ok how to use :\F\File::test();';
    }


}



