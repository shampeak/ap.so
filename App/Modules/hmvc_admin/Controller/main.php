<?php

namespace Controller;

/**
 * ?  “访客”
 * @  “已授权“
 */


class main extends BaseController {

      public function doLogin(){
            //echo 主界面



            /*
             * 1 : 表数量
             * 2 : 用户数量
             * 3 : 记录条数
             * 4 : 在线数量 - 有效token数量
             * 5 : 消息数量
             *
             * 折线图
             *
             * 用户增长 [ 日 月 年 ]
             * 产生的测量数据 [ 月 日 年 ]
             * 消息[ 日 月 年 ]
             * 文章 [ 日 月 年 ]
             * 其他统计信息
             */

            view();
      }

      public function doIndex(){
            //

//D(bus());
//

            view();
      }

}




