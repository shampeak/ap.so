<?php

namespace Controller;

/**
 * ?  “访客”
 * @  “已授权“
 */


class main extends BaseController {

      public function doProfilePOST(){
            //D(bus());
            view('',[
                'res' => bus('user')
            ]);
      }

      public function doProfile($params = ''){
            //D(bus());
            view('',[
                  'res' => bus('user')
            ]);
      }

      public function doIndex(){
            view();
      }

}




