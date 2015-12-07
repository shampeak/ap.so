<?php


/**
 * ?  “访客”
 * @  “已授权“
 */
class help extends BaseController {

    public function doIndex(){
        //=======================================
        $md = sapp('Struct')->zs();
        print_r($md);
        exit;
        $this->display('',[
            'res'  =>  "
        1 : DEMO [demo]
        2 : geter列表查看
        3 : 对象列表查看
        4 : sc内容查看
        5 : router内容查看
        6 : 其他继续整理
        ",
        ]);

    }

}




