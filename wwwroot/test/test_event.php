<?
//require_once "Benchmark/Iterate.php";
//$bench = new Benchmark_Iterate;
//
//require_once "../Grace/Common.php";
//
//
//
//$charset = $GLOBALS['db_charset'] = 'gbk';//utf-8
//$content = "今年春晚，我特地关注了赵本山的新小品《捐助》，这篇小品对弱势群体的不尊重并无改变，小品讲的是赵本山与其弟子扮演两个捐助者...";
//
///*phpwind*/
////$bench->run(50,"substrs",$content,30);
///*discuz*/
//
//
//
//$bench->run(50,"C",$content,30);
//
//$result = $bench->get();
//$bench->display();
////var_dump($result);
//
//asdfasfdasdf



class MyClass{
      public $eventMap = array();
      function on($evtname , $handle ){ //注册一个事件上的响应回调函数
            $this->eventMap[$evtname]=$handle;
      }
      function trigger($evtname , $scope=null){ //触发一个事件，也就是循环调用所有响应这个事件的回调函数
            call_user_func_array( $this->eventMap[$evtname] , $scope);
      }
}

$MyClass = new MyClass;
$MyClass->on('post' , function($a , $b ){
      echo " a = $a ; \n ";
      echo " b = $b ; \n ";
      echo " a + b = ".( $a + $b) . ";\r\n ";
} );

echo '<pre>';

$MyClass->trigger('post' , array( 123 , 321 )  );//框架内部触发

echo 'mark';