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


      //����login�����û�
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
//ִ��һЩǰ�ò���

class BeforeMiddleware
{
      public function handle($request, Closure $next)
      {
            // Perform action

            return $next($request);
      }
}

//ִ��һЩ���ò���

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