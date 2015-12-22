<?php

namespace Controller;

/**
 * ?  “访客”
 * @  “已授权“
 */


class set extends BaseController {

      public function doIndex(){

            //echo 主界面
            view();
      }

      public function doDebug(){
            D(bus());
      }

      /*
      |---------------------------------------------------------------
      | 标准的 ca 事件
      |---------------------------------------------------------------
      */

      public function doGroupPost(){}
      public function doGroup(){}
      public function doGroup_BoxPost(){}
      public function doGroup_Box(){}
      public function doGroup_DialogPost(){}
      public function doGroup_Dialog($param){}
      //标准扩展
      public function doGroup_Delete($param){}
      public function doGroup_States($param){}
      //
      public function doGroup_Ext($param){}
      public function doGroup_Ed($param){}
      public function doGroup_De($param){}


}




