<?php


class TestWidget extends Widget {
    public $dir = __DIR__;

    public function invoke($arr){
        $data['res'] =  $arr;
        $this->display('',$data);
    }

}
