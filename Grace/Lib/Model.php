<?php

/**
 * Class Model
 * �����ﲻ����״̬��,��ģ��ȥ����
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

      //����jsonout
      public $json     = array();

      public function __construct(){
            $this->S = \Seter\Seter::getInstance();
            $this->get      = $this->S->request->get;
            $this->post     = $this->S->request->post;
            $this->cookie   = $this->S->request->cookie;

            //$this->coderes = $this->DefaultCoderes();
            //$this->jsoncode(0);          //��ʼ״̬
            $this->_init();
      }

      public function _init()
      {
      }


//      //����д
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
//      //����������
//      //���ز������    ����      �������ֵ
//      public function res($data = '')
//      {
//            if(!empty($data))  $this->json['data'] = $data;
//            return $this->json['data'];
//      }
//
//      //���ز��������json���� ���� code msg data
//      //msg = $codelib[code]
//      public function AjaxReturn()
//      {
//            echo json_encode($this->json);
//            exit;
//      }
//
//      //����json����
//      public function json()
//      {
//            return $this->json;
//      }
//
//      //���ز���bool
//      public function bool()
//      {
//            return intval($this->json['code']>0)?true:false;
//            exit;
//      }

}
