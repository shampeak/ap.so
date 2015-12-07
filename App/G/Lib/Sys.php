<?php
/*
 *
 * */
namespace G\Lib;
!defined('FAST_PATH') && die('out of app');

class Sys extends \G\Mg
{

    /**
     * 控制器中调用 $str =         $this->G('user');
     */
    public function index(){

    }

    public function dbused()
    {
        $sql = "select table_name
                from information_schema.tables
                where table_schema='{$this->db->Config['database']}' and table_type='base table'";
        $rc = $this->db->getcol($sql);
        foreach($rc as $value){
            $mc[] = [
                'table' => $value,
                'val'   => intval($this->table->$value->getcount())
            ];
        }
        return $mc;
    }

    public function getlist($parm = '')
    {
        return 'user.getlist'.$parm;
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
            'dbused'=>'返回数据库使用情况统计; 参数无',
            'getlist'=>'$parm = ""',
        ];

    }

}

