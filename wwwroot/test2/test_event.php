<?
//require_once "Benchmark/Iterate.php";
//$bench = new Benchmark_Iterate;
//
//require_once "../Grace/Common.php";
//
//
//
//$charset = $GLOBALS['db_charset'] = 'gbk';//utf-8
//$content = "���괺�����صع�ע���Ա�ɽ����СƷ������������ƪСƷ������Ⱥ��Ĳ����ز��޸ı䣬СƷ�������Ա�ɽ������Ӱ�������������...";
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
      function on($evtname , $handle ){ //ע��һ���¼��ϵ���Ӧ�ص�����
            $this->eventMap[$evtname]=$handle;
      }
      function trigger($evtname , $scope=null){ //����һ���¼���Ҳ����ѭ������������Ӧ����¼��Ļص�����
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

$MyClass->trigger('post' , array( 123 , 321 )  );//����ڲ�����

echo 'mark';