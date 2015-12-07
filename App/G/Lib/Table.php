<?php
/*
 *
 * 内置对象db / table
 * */
namespace G\Lib;
!defined('FAST_PATH') && die('out of app');

class Table extends \G\Mg
{

    /**
     * 控制器中调用 $str =         $this->G('user');
     */

    public function g_userapi_all()
    {
        return $this->table->g_userapi->order("sort desc,id desc")->getall();
    }



















    /**
     * @return array
     * 手动配置
     */
    //对方法的说明
    public function ds()
    {
        return [
            'index'=>'',
            'g_userapi_all'=>'$parm = ""',
        ];

    }

}


