<?php
/**
 * https://github.com/shampeak/GracePhp
 */

error_reporting(E_ALL ^ E_NOTICE);      //
define(DOCPATH,'../');
include(DOCPATH."App/Seter/Document/View/SeterCommon.php");     //通用加载
//ok加载完成

//参数
$params = $_GET['bookid']?intval($_GET['bookid']):1;

//计算        运算
$booknode  = $S->table->g_booknode->where("bookid = '$params' and enable = 1")->order(" sort desc,nodeid desc")->getall();

$Cimarkdown = new Cimarkdown();
foreach($booknode as $key=>$value){
    $booknode[$key]['nr']       = $Cimarkdown->markit($booknode[$key]['nr']);
    $booknode[$key]['nrcode']   = $Cimarkdown->markit($booknode[$key]['nrcode']);
}
foreach($booknode as $key=>$value){
    if($value['preid'] ==0){
        //节点
        $node[] = $value;
    }else{
        $node_c[$value['preid']][] = $value;  //child
    }
}
$node = $node?:[];
foreach($node as $key=>$value){
    $node[$key]['child'] = $node_c[$value['nodeid']];
}

//D($node);
//exit;


$booklist   = $S->table->g_book->where("enable = 1")->getall()?:[];
$node       = $node;
$book       = $S->table->g_book->where("bookid = $params")->getrow()?:[];



//模板显示
include("../App/Seter/Document/View/SeterDefault.php");
exit;
