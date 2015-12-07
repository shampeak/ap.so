<?php


class Router
{
    public $rs = [];        //路由源数据 第一步初始

    //传入的初始信息
    public $app_defaultConfig = [];
    public $ent = [];
    public $env = [];
    public $headers = [];
    public $app = [];
    public $modulelist = [];
    //==========================================
    public $router = [];        //路由信息


    public static  $_instance;

    //扩展方法 /c/a/ex
    public function ActionExt()
    {
        $lib = C('app')['ActionExt'];
        $lib = is_array($lib)?$lib:[];
        return $lib;
    }

//    public function MethodType()
//    {
//        return [
//            'POST',
//            'GET',
//            'PUT',
//            'DELETE',
//            'PATCH',
//            'OPTIONS',
//        ];
//    }

    //路由结果模板
    public function RouterDefault(){
        return [
            'method_modules'        => '',
            'method_controller'     => '',
            'method_action'         => '',
            'method_action_ext'     => '',
            'methodtype'            => '',
            'ActionPrefix'          => '',
        ];
    }

    private function __construct(){}

    public function load()
    {
        $router_ = $this->router_do();

        $router['method_modules'] = $router_['m'];
        $router['method_controller'] = $router_['c']?:C('app')[default_controller];
        $router['method_action'] = $router_['a']?:C('app')[default_controller_method];
        $router['method_action_ext'] = $router_['ex'];
        $router['methodtype'] = C('env')[REQUEST_METHOD];
        $router['ActionPrefix'] = C('app')[default_controller_method_prefix];
        $router['param'] = $router_['param'];
        $router['params'] = $router_['params'];

        //action 计算
        $action = $router['ActionPrefix'].ucfirst($router['method_action']);
        $router['Action'] = $action;

        if($router['method_action_ext'])                                        $action .= '_'.$router['method_action_ext'];
        if($router['methodtype'] && $router['methodtype'] != 'GET')             $action .= '_'.$router['methodtype'];

        $router['ActionExt'] = $action;

        //tpl
        $router['tpl'] = $router['method_action'];
        if($router['method_action_ext'])                                        $router['tpl'] .= '_'.$router['method_action_ext'];
        if($router['methodtype'] && $router['methodtype'] != 'GET')             $router['tpl'] .= '_'.$router['methodtype'];


          if($router['method_modules']){
              $router['Appbase'] = C('app')['APP_PATH'].'Modules/'.C('app')['modulelist'][$router['method_modules']].'/';
          }else{
              $router['Appbase'] = C('app')['APP_PATH'];
          }

        C('Router',$router);
    }


//------------------------
    public function router_do()
    {
        $config = ConfigManager::getInstance();       //未完成的

        $pathinfo_query = $config->env['pathinfo_query'];
        $modulelist     = is_array($config->modulelist)?$config->modulelist:[];
        $pathinfo_query = strtolower($pathinfo_query);

        $pq = explode('&',$pathinfo_query);
        //第一个不存在等号
        $str = current($pq);


        if(!isset(explode('=',  $str)[1])){
            $pq_ = explode('/',trim($str,'/'));
            if(in_array(current($pq_),$modulelist)){
                $v['m'] = current($pq_);
                array_shift($pq_);
            }
            $v['c'] = array_shift($pq_);
            $v['a'] = array_shift($pq_);

            if(in_array(current($pq_),$this->ActionExt())){
                $v['ex'] = current($pq_);
                array_shift($pq_);
            }
            if(count($pq_) ==1){
                $v['param'] =current($pq_);
                array_shift($pq_);
            }else{
                //==============================================
                //计算params
                //D($pq_);
                $_params = [];
                $count = ceil(count($pq_) / 2);
                for ($i = 0; $i < $count; $i++) {
                    $ii = $i * 2;
                    isset($pq_[$ii + 1]) && $_params[$pq_[$ii]] = $pq_[$ii + 1] ;
                }
                $v['params'] = $_params;            //这个是path后面的参数
                //==============================================
            }
            array_shift($pq);
        }
        $s= [];
        foreach($pq as $value){
            $pq_ = explode('=',$value);
            !empty($pq_[0]) && !empty($pq_[1]) && $s[$pq_[0]] = $pq_[1];
        }

        $s_ = $v['params']?$v['params']:[];
        $v['params'] = array_merge($s_,$s);

        //--------------------------------------------
        //D($v);
        //--------------------------------------------

        //结果修正

        if($v['params']['m']){
            if(in_array($v['params']['m'],$modulelist)){
                $v['m'] = $v['params']['m'];
            }
        }
        if($v['params']['c']) $v['c'] = $v['params']['c'];
        if($v['params']['a']) $v['a'] = $v['params']['a'];
        if($v['params']['ex']) $v['ex'] = $v['params']['ex'];





        return $v;
    }

    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }


    /**     独立运行 不依赖于本类的其他方法 运行处模块名,并且传递出去
     * @return array
     * 这个在conf中第一个被调用时入口程序
    //根据pathinfo_query 获取模块信息
     */
    public  function getModule()
    {
        //计算模块
        //并且返回
        $config = ConfigManager::getInstance();       //未完成的
        $pathinfo_query = $config->env['pathinfo_query'];
        $modulelist     = is_array($config->modulelist)?$config->modulelist:[];

        //根据这两个计算出模块信息
//        D($pathinfo_query);
//        D($modulelist);

        $pathinfo_query = strtolower($pathinfo_query);

        $pq = explode('&',$pathinfo_query);

        //第一个存在等号
        if(!isset(explode('=',  current($pq))[1])){
            $mo_ = current(explode('/',trim(array_shift($pq),'/')));     //如果存在的话,mo就是第一个/之前的值
        }

        foreach($pq as $key=>$value){
            $pq_ = explode('=',$value);
            $pq_[0] && $pq_[1] && $pq__[$pq_[0]] = $pq_[1];
        }
        $mo_ = $pq__['m']?:$mo_?:'';

        //监测是否在modulelist中
        if($mo_){
            $mo = in_array($mo_,$modulelist)?$mo_:'';
        }
        return $mo;
    }


}
