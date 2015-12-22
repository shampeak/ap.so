<?php

namespace Controller;

/**
 * ?  “访客”
 * @  “已授权“
 */


class home extends BaseController {

      public function doIndex(){
            //echo 主界面
            //view();
            D(bus());
            echo '跳转login or main';

      }

}




