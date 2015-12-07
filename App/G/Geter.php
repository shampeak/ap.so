<?php

namespace G;
!defined('FAST_PATH') && die('out of app');
/*
 * 配置 \seter\config\default\Geter
 * 数据持久化
 * 可以在中间加入数据缓存层
 * 这样来减少代码的工作量
 *
 * 系统方法包括
 * 类名检查
 * 相关Seter 下config 设置
\G\Geter::getInstance()->show();                //调试
\G\Geter::getInstance()->display();             //调试

D($this->G('debug.display'));       //调试
D($this->G('debug.show'));          //调试
D($this->G('user.show'));           //调试

Error::Geter is not permit empty!!
Error::out of Geter limit!
Error::out of Geter Method limit!
 * */

class Geter
{
    private static $instance    = null;         //单例调用
    public $Config = array();

    private  function __construct($items = array())
    {
        $config = include(FAST_PATH.'/Config/Default.php');
        $this->Config = $config['Geter'];
    }

    public static function getInstance(){
        !(self::$instance instanceof self)&&self::$instance = new self();
        return self::$instance;
    }

    public function getClass($m)
    {
        $classname = '\\G\\Lib\\'.ucfirst($m);
        $mo = new $classname;
        return $mo;
    }

    public function get($key='')
    {
        if($key == 'debug.show')        return $this->show();
        if($key == 'debug.display')     return $this->display();

        if(!$key)errormsg('Error::Geter is not permit empty!!');

        $mc = explode('.',$key);
        $c = $mc[0]?:'';
        $c = ucfirst(strtolower($c)); //首字母大写
        $a = $mc[1]?:'index';
        $p = $mc[2]?:'';
        //===========================================================
        //范围
        $fw = $this->Config['FW']?:[];
        if(!in_array($c,$fw))errormsg('Error::out of Geter limit!');        //超出范围

        //===========================================================
        $class = $this->getClass($c);
        //===========================================================
        $methodfw = $class->show();
        array_push($methodfw,'show','ds','index');
        //===========================================================
        if(!in_array($a,$methodfw)) errormsg('Error::out of Geter Method limit!');        //超出范围
        return $class->$a($p);
    }

    function display()
    {
        D($this->show());
        exit;
    }

    //数组形式返回
    function show()
    {
        $me =  $this->Config['FW'];     //类范围
        foreach($me as $classname){
            $class = $this->getClass($classname);
            $ds[$classname] = $class->ds();
        }
        return $ds;
        //返回所有的类,属性和方法
        //用于调试和查看
    }


}


