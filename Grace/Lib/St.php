<?php

/**
* Class St
* @package Seter\Library
* �����еĲ������ɵ� ��״̬��������
*
//$ar = [
//'200'=>'ok',
//'91'=>'ok',
//];
//St::Getcodelist($ar);            //1 ��code�б����ȥ
//St::jsoncode(-200);              //����״̬
//St::jsonres("asdfasd");          //��������
//D(St::json());                   //���json����
//D(St::jsonres());                //�����������
//D(St::AjaxReturn());             //���json���      //����ֹ
//D(St::bool());                   //�������ֵ
//echo '<hr>';
//D(St::$codelist);                 //��ʾ�б�
//exit;
*
*/
class St{

      public static $json = [];
      public static $codelist = [];


      public static function __ini()
      {
            self::$codelist = self::DefaultCoderes();
      }

      public static function DefaultCoderes()
      {
            return [
                  '0'     => 'ini',
                  '200'   => '�����ɹ�',
                  ];
      }

      public static function Getcodelist($list = [])
      {
            foreach($list as $key=>$value){
                  self::$codelist[$key] = $value;
            }
      }
      //    +-----------------------------------------------------------+
      //    +-----------------------------------------------------------+

      //״̬����
      public static function jsoncode($code = 0)
      {
            self::$json = [
                  'code'  => $code,
                  'msg'   => self::$codelist[$code]
            ];
            return true;
      }


      //����������
      //���ز������    ����      �������ֵ
      public static function jsonres($data = '')
      {
            if(!empty($data))  self::$json['data'] = $data;
            return self::$json['data'];
      }

      //����json����
      public static function json()
      {
            return self::$json;
      }

      //����json��
      public static function AjaxReturn()
      {
            echo json_encode(self::$json);
            exit;
      }

      //���ز���bool
      public static function bool()
      {
            //        return self::$json['code'];
            return intval(self::$json['code']>0)?true:false;
            exit;
      }

      //�򻯵ķ���
      public static function J($code =0,$msg= '',$data = [])
      {

            self::$json['code'] = $code;
            if($msg) self::$json['msg']  = $msg;
            if($data) self::$json['data'] = $data;
            echo json_encode(self::$json);
            exit;
      }

      public static function DIS()
            {ECHO '---';

            }

      }
