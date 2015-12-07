<?php

/**
* Class St
* @package Seter\Library
* 把所有的操作归纳到 对状态操作中来
*
//$ar = [
//'200'=>'ok',
//'91'=>'ok',
//];
//St::Getcodelist($ar);            //1 把code列表传入进去
//St::jsoncode(-200);              //输入状态
//St::jsonres("asdfasd");          //设置内容
//D(St::json());                   //输出json数据
//D(St::jsonres());                //输出内容数据
//D(St::AjaxReturn());             //输出json语句      //会中止
//D(St::bool());                   //输出布尔值
//echo '<hr>';
//D(St::$codelist);                 //显示列表
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
                  '200'   => '操作成功',
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

      //状态操作
      public static function jsoncode($code = 0)
      {
            self::$json = [
                  'code'  => $code,
                  'msg'   => self::$codelist[$code]
            ];
            return true;
      }


      //结果输出修饰
      //返回操作结果    或者      给结果赋值
      public static function jsonres($data = '')
      {
            if(!empty($data))  self::$json['data'] = $data;
            return self::$json['data'];
      }

      //返回json数组
      public static function json()
      {
            return self::$json;
      }

      //返回json串
      public static function AjaxReturn()
      {
            echo json_encode(self::$json);
            exit;
      }

      //返回操作bool
      public static function bool()
      {
            //        return self::$json['code'];
            return intval(self::$json['code']>0)?true:false;
            exit;
      }

      //简化的方法
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
