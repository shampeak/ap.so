<?php
/*
 *
 * 内置对象db / table
 * */
namespace G\Lib;
!defined('FAST_PATH') && die('out of app');

class User extends \G\Mg
{

    /**
     * 控制器中调用 $str =         $this->G('user');
     */

    public function info($id = '')
    {
        echo $id;
        return $res;
    }

    public function getlist($parm = '')
    {
        return 'user.getlist'.$parm;
    }

    /**
     * 辅助方法,开发用
     */

    public function show()
    {
        $lib =  get_class_methods($this);            //所有的方法
        $lib = array_diff($lib,['show','ds']);           //去掉show方法
        return $lib;
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
            'info'=>'$parm = ""',
            'getlist'=>'$parm = ""',
        ];

    }

}


