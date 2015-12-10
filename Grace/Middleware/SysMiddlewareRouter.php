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

class SysMiddlewareRouter extends MiddlewareBase implements MiddlewareInterface
{
      /*
      |--------------------------------------------------------
      | 定义 中间件主体
      |--------------------------------------------------------
      |
      */
      public function handle($request, \Closure $next)
      {
            sc('Router',[
                'm'     => sc('Get')['m'],
                'c'     => sc('Get')['c'],
                'a'     => sc('Get')['a'],
                'e'     => sc('Get')['e'],
                'aPrefix'     => 'do',
                'param'       => sc('Get')['_param'],
                'params'      => sc('Get'),
                'type'      => sc('Environment')['REQUEST_METHOD'],

                'action'      => 'do'.ucfirst(sc('Get')['a']),
                'actionExt'   => 'do'.ucfirst(sc('Get')['a']).'_'.ucfirst(sc('Get')['e']),            //加后缀 _get _post
                'tpl'         => sc('Get')['a'].'.htm',
                'Appbase'     => '../App/basdfasdf/asdf/asdf',
               // 'cname'       => asdfasdfsf::Lclass,            //控制器调用地址
            ]);
            // Perform action
            //建立router信息
            D(sc());  //转控制器 转bus();
            return $next($request);
      }

}
