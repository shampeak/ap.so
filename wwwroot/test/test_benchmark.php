<?
require_once "Benchmark/Iterate.php";
$bench = new Benchmark_Iterate;

require_once "../../Grace/Common.php";



$charset = $GLOBALS['db_charset'] = 'gbk';//utf-8
$content = "今年春晚，我特地关注了赵本山的新小品《捐助》，这篇小品对弱势群体的不尊重并无改变，小品讲的是赵本山与其弟子扮演两个捐助者...";

/*phpwind*/
//$bench->run(50,"substrs",$content,30);
/*discuz*/



$bench->run(50,"C",$content,30);

$result = $bench->get();
$bench->display();
//var_dump($result);

//asdfasfdasdf

