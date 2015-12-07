<?php

/**
 * Class Model
 * 在这里不操作状态机,让模型去操作
 */
class Model
{
      public $get     = array();
      public $post    = array();
      public $cookie  = array();

      public $res     = array();

      public $S     = null;

      //codelist
      public $coderes  = array();

      //用于jsonout
      public $json     = array();

      public function __construct(){
            $this->S = \Seter\Seter::getInstance();
            $this->get      = $this->S->request->get;
            $this->post     = $this->S->request->post;
            $this->cookie   = $this->S->request->cookie;

            //$this->coderes = $this->DefaultCoderes();
            //$this->jsoncode(0);          //初始状态
            $this->_init();
      }

      public function _init()
      {
      }


//      //待重写
//      public function DefaultCoderes()
//      {
//            return [
//                '0'=>'ini'
//            ];
//      }
//
//      public function jsoncode($code = 0)
//      {
//            $this->json = [
//                'code'  => $code,
//                'msg'   => $this->coderes[$code]
//            ];
//            return true;
//      }

//
//      //结果输出修饰
//      //返回操作结果    或者      给结果赋值
//      public function res($data = '')
//      {
//            if(!empty($data))  $this->json['data'] = $data;
//            return $this->json['data'];
//      }
//
//      //返回操作结果的json数据 包含 code msg data
//      //msg = $codelib[code]
//      public function AjaxReturn()
//      {
//            echo json_encode($this->json);
//            exit;
//      }
//
//      //返回json数组
//      public function json()
//      {
//            return $this->json;
//      }
//
//      //返回操作bool
//      public function bool()
//      {
//            return intval($this->json['code']>0)?true:false;
//            exit;
//      }

}
