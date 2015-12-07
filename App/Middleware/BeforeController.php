<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/4 0004
 * Time: 9:53
 */

namespace App\Middleware;

class BeforeController
{

      public function handle($request, Closure $next)
      {
            // Perform action

            return $next($request);
      }


      //根据login返回用户
      public function login($userlogin = '')
      {
            if ($request->input('age') <= 200) {
                  return redirect('home');
            }
            return $next($request);
            return $test;
      }




}


/*
//执行一些前置操作

class BeforeMiddleware
{
      public function handle($request, Closure $next)
      {
            // Perform action

            return $next($request);
      }
}

//执行一些后置操作

class AfterMiddleware
{
      public function handle($request, Closure $next)
      {
            $response = $next($request);

            // Perform action

            return $response;
      }
}
*/