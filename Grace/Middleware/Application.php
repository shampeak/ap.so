<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/7 0007
 * Time: 20:19
 */


namespace Grace\Middleware;

class Application
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

            if(version_compare(PHP_VERSION,'5.4.0','<'))
                  die('PHP版本太低， PHP > 5.4.0 !');

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
