<?
require_once "Benchmark/Iterate.php";
$bench = new Benchmark_Iterate;

require_once "../../Grace/Common.php";



$charset = $GLOBALS['db_charset'] = 'gbk';//utf-8
$content = "���괺�����صع�ע���Ա�ɽ����СƷ������������ƪСƷ������Ⱥ��Ĳ����ز��޸ı䣬СƷ�������Ա�ɽ������Ӱ�������������...";

/*phpwind*/
//$bench->run(50,"substrs",$content,30);
/*discuz*/



$bench->run(50,"C",$content,30);

$result = $bench->get();
$bench->display();
//var_dump($result);

//asdfasfdasdf

