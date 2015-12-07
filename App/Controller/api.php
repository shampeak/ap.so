<?php

/**
 * Class api
 *
 * 状态变化
 * json输出
 * St状态机输出
 *
 */
class api extends BaseController {

    //根据情况进行跳转
    public function doIndex(){
    }


    //仪表盘调用
    public function doGetdbused()
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
        echo json_encode($mc);
        exit;
    }


}
