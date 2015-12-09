<?php
      /*
      |--------------------------------------------------------
      | 执行初始化操作
      |--------------------------------------------------------
      | 所有工作任务都可以规划到这个流程当中去,如果不够再重新规划,不破坏现有结构
      | 调用方法为 App\Application::run();
      |
      |
      SysMiddlewareEnvini                 => 必要的环境初始化和设置
      sc() -> SysMiddlewareConfigini      => 配置文件的初始化和设置
      sc() -> SysMiddlewareBusini         => 获得前端信息流模板       -> 获得 bus()
      ->获得完善完整的sc 和bus 信息模板
      //ok 规划完成,交给控制器去执行
      |
      |
      $list = [
            SysMiddlewareEnvini     => '',
            SysMiddlewareConfigini  => '',
            SysMiddlewareBusini     => '',
      ]
      |
      |
      */

namespace Grace\Middleware;

use Grace\Set\MiddlewareBase;
use Grace\Set\MiddlewareInterface;


class SysMiddlewareConfigini extends MiddlewareBase implements MiddlewareInterface
{
      public function __construct(){}

      /*
      |--------------------------------------------------------
      | 定义callback
      |--------------------------------------------------------
      | 特殊情况下进行修改
      */
      public function next()
      {
            return function($request){return $request;};
      }

      /*
      |--------------------------------------------------------
      | 定义 需要操作的数据
      |--------------------------------------------------------
      | 特殊情况下进行修改
      */
      public function request()
      {
            //对整个sc目录结构进行调整
            return null;
//            return sc();
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

      /*
      |--------------------------------------------------------
      | 执行一些前置操作
      |--------------------------------------------------------
      |
      */
      public function BeforeHandle($request, \Closure $next)
      {
            // Perform action
            return $next($request);
      }

      /*
      |--------------------------------------------------------
      | 执行一些后置操作
      |--------------------------------------------------------
      |
      */
      public function AfterHandle($request, \Closure $next)
      {
            $response = $next($request);
            // Perform action
            return $response;
      }


      /*
      |--------------------------------------------------------
      | 定义 最后的动作
      |--------------------------------------------------------
      | 可以不返回数据,中断执行或设置某些数据
      |
      */
      public function terminate($request = null)
      {
            //处理结束后做一些操作
            // Store the session data...
      }
}
