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

namespace App\Middleware;

use Grace\Set\MiddlewareBase;
use Grace\Set\MiddlewareInterface;

/*
 * 调用 //先进行分页运算
D(Md([
    'url'         => '/admin/set/menu/{$page}',
    'page'        => $page,
    'count'       => sapp('SQLite')->getone("select count(*) from menu where $where"),
//   'pagesize'    => bus('_page')['pagesize'],
],[
    'ControllerPageMiddleware'      => \App\Middleware\ControllerPageMiddleware::class,         //分页运算
]));
 */



class ControllerPageMiddleware extends MiddlewareBase implements MiddlewareInterface
{
      public function BeforeHandle($request, \Closure $next)
      {
            $request['count']       = intval(abs($request['count']));
            $request['page']        = $request['page']?:1;
            $request['page']        = intval(abs($request['page']));
            $request['pagesize']    = $request['pagesize']?:bus('_page')['pagesize']?:10;
            $request['pagesize']    = intval(abs($request['pagesize']));
            //pagemax
            $request['pagemax']     = ceil($request['count'] / $request['pagesize']);
            $request['pagemax']     = $request['pagemax']?:1;
            $request['page']        = ($request['page'] <= $request['pagemax'])?$request['page']:$request['pagemax'];
            // Perform action

            $request['limit']       = ($request['page']-1)*$request['pagesize'];

            //计算前一页 后一页
            $request['pagepre']     = $request['page'] - 1;
            $request['pagepre']     = ($request['pagepre']<1)?1:$request['pagepre'];
            $request['pagenext']    = $request['page'] + 1;
            $request['pagenext']    = ($request['pagenext']>$request['pagemax'])?$request['pagemax']:$request['pagenext'];
            $request['limit']       = 'limit '.($request['page'] -1)*$request['pagesize'].','.$request['pagesize'];
            return $next($request);
      }

      /*
      |--------------------------------------------------------
      | 定义 中间件主体
      |--------------------------------------------------------
      |
      */
      public function handle($request, \Closure $next)
      {

            //计算导航样式
            $nav = '';
            if($request['pagemax'] > 1){
                  $bbf = bus('_page')['bbf'];
                  $aaf = bus('_page')['aaf'];


//[nav] => <li><a href="{$url}">{$page}</a></li>


                  if($request['page'] == 1){
                        $bf = bus('_page')['bfd'];
                  }else{
                        $bf = bus('_page')['bf'];
                        $url =  str_replace('{$page}',$request['pagepre'],$request['url']);
                        $bf = str_replace('{$url}',$url,$bf);
                  }
                  if($request['page'] == $request['pagemax']){
                        $af = bus('_page')['afd'];
                  }else{
                        $af = bus('_page')['af'];
                        $url =  str_replace('{$page}',$request['pagenext'],$request['url']);
                        $af = str_replace('{$url}',$url,$af);
                  }
                  for($i=1;$i<=$request['pagemax'];$i++){
                        $url =  str_replace('{$page}',$i,$request['url']);
                        if($request['page'] == $i){
                              $_nav = bus('_page')['navactive'];
                        }else{
                              $_nav = bus('_page')['nav'];
                        }
                        $_nav = str_replace('{$url}',$url,$_nav);
                        $_nav = str_replace('{$page}',$i,$_nav);
                        $nav .= $_nav."\n";
                  }
                  $nav = $bf.$nav.$af;
                  $nav = $bbf.$nav.$aaf;
            }
            $request['nav'] = $nav;
            // Perform action
            return $next($request);
      }

}
