<?php

/**
 * Class Ms
 * hook : _init
 * 测试用
 */
class Modeltest extends Model
{

    public function say()
    {
        /**
         *
         * res          //输出查看内容
         * AjaxReturn   //返回json数据
         * json         //查看json数据
         * bool         //bool值返回
         */


        echo 'hello';
    }



    /**
     * hook
     * 初始方法
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * hook
     * 可以重写
     */
    public function _init()
    {
//        $this->get      = $this->S->request->get;
//        $this->post     = $this->S->request->post;
//        $this->cookie   = $this->S->request->cookie;
    }

    //+=========================================================
    //状态 数据
    //+=========================================================
    public function DefaultCoderes()
    {
        return [
            '0'     => 'ini',
            '200'   => '操作成功',
        ];
    }

}
