<?php
      /*
      |--------------------------------------------------------
      | 执行初始化操作
      |--------------------------------------------------------
      | 不对sc 和bus 进行实质性操作
      |
      */

namespace Grace\Middleware;

use Grace\Set\MiddlewareBase;
use Grace\Set\MiddlewareInterface;

class SysMiddlewareEnvini extends MiddlewareBase implements MiddlewareInterface
{
      /*
      |--------------------------------------------------------
      | 定义 需要操作的数据
      |--------------------------------------------------------
      | 特殊情况下进行修改
      */
      public function request()
      {
            //根据设置配置时区
            date_default_timezone_set(sc('Env')['default_timezone']);


            /*
            |--------------------------------------------------------
            | 定义 xss 过滤
            | 定义 xss 过滤 - 同理还有sql 防注入
            |--------------------------------------------------------
            | 方案 - 对要输入到页面的内容建立xss中间件
            htmlentities
            htmlspecialchars
            反函数 htmlspecialchars_decode

            addslashes()
            stripslashes()

            urldecode()
            urlencode()
            */
            //
            //方案 - 对要输入到页面的内容建立xss中间件
            //$html['name'] = htmlentities($clean['name'], ENT_QUOTES, 'UTF-8');
            //$html['comment'] = htmlentities($clean['comment'], ENT_QUOTES, 'UTF-8');
            //echo "<p>{$html['name']} writes:<br />";
            //echo "<blockquote>{$html['comment']}</blockquote></p>";




            //htmlentities()或是htmlspecialchars()。

phpinfo();

            return null;
      }

      /*
      |--------------------------------------------------------
      | 定义 中间件主体
      |--------------------------------------------------------
      |
      */
      public function handle($request, \Closure $next)
      {
            // Perform action

            return $next($request);
      }

}
