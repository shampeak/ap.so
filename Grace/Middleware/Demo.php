<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/4 0004
 * Time: 9:53
 */

namespace Grace\Middleware;

class Router
{

      public $states = 1;

      public function __construct(){
      }

      //中间件
      public function handle($request, \Closure $next)
      {
            // Perform action
            echo 3;
            return $next($request);
      }

      //执行一些前置操作
      public function BeforeHandle($request, \Closure $next)
      {
            echo 1;
            // Perform action
            return $next($request);
      }

      //执行一些后置操作
      public function AfterHandle($request, \Closure $next)
      {
            $response = $next($request);
            // Perform action
            return $response;
      }

      public function terminate($request, $response)
      {
            // Store the session data...
      }





}
