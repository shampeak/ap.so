<?php
/**
 * https://github.com/shampeak/GracePhp
 */
error_reporting(E_ALL ^ E_NOTICE);      //
define(DOCPATH,'../');
include(DOCPATH."App/Seter/Document/View/SeterCommon.php");     //通用加载
//ok加载完成
//参数
$bookid = $_GET['bookid']?intval($_GET['bookid']):'';
$nodeid = $_GET['bookid']?intval($_GET['nodeid']):'';

if(!empty($_POST['nodeid'])){
    //编辑操作提交
    $nodeid = $_POST['nodeid'];
    $S->table->g_booknode->where("nodeid = '$nodeid'")->update($_POST);
    R("SeterDoclist.php?bookid={$_POST['bookid']}");
    exit;
}

if(!empty($_POST)){
    //添加操作
    $S->table->g_booknode->insert($_POST);
    R("SeterDoclist.php?bookid={$_POST['bookid']}");
    exit;
}

//显示
//计算        运算
$node  = $S->table->g_booknode->where("bookid = '$bookid' and nodeid = '$nodeid'")->getrow();
//exit;
//
//$Cimarkdown = new Cimarkdown();
//foreach($booknode as $key=>$value){
//    $booknode[$key]['nr']       = $Cimarkdown->markit($booknode[$key]['nr']);
//    $booknode[$key]['nrcode']   = $Cimarkdown->markit($booknode[$key]['nrcode']);
//}
//foreach($booknode as $key=>$value){
//    if($value['preid'] ==0){
//        //节点
//        $node[] = $value;
//    }else{
//        $node_c[$value['preid']][] = $value;  //child
//    }
//}
//$node = $node?:[];
//foreach($node as $key=>$value){
//    $node[$key]['child'] = $node_c[$value['nodeid']];
//}

//D($node);
//exit;


$booklist   = $S->table->g_book->colm("bookid,bookname")->getmap()?:[];

$node       = $node;
$prelist       = $S->table->g_booknode->colm("nodeid,title")->where("preid = 0")->getall()?:[];
//D($prelist);

//D($prelist);
//D($node);


//模板显示
include("../App/Seter/Document/View/SeterDocaddedit.php");
exit;
