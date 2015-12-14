<?php
      /*
      |--------------------------------------------------------
      | 执行初始化操作
      |--------------------------------------------------------
      |
      |
      */

namespace Grace\Middleware;

use Grace\Set\MiddlewareBase;
use Grace\Set\MiddlewareInterface;

class SysMiddlewareBusbuild extends MiddlewareBase implements MiddlewareInterface
{
      /*
      |--------------------------------------------------------
      | 定义 中间件主体
      |--------------------------------------------------------
      |
      */
      public function handle($request, \Closure $next)
      {

            //初步建立bus
            bus('root',       sc('Router')['m']?rtrim(APPROOT,'/').'/Modules/'.sc('Modulelist')[sc('Router')['m']].'/':rtrim(APPROOT,'/').'/');
            bus('app',        sc('App'));
            bus('router',     sc('Router'));
            bus('env',        sc('Env'));
            bus('view',        []);

            // Perform action
            return $next($request);
      }

}
