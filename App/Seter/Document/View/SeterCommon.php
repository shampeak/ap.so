<?php

//公用的函数
include(DOCPATH."Grace/Common.php");
//载入Seter类
include(DOCPATH."App/Seter/I.php");
//获取实例化

//载入系统配置-》主要是为了能正确使用数据库
$conf['app'] = include(DOCPATH."App/Conf.php");
C($conf);   //载入配置
//系统数据
//获取到配置文件
$config = include(DOCPATH."App/Seter/Config/Default.php");
//$de = include("../App/Seter/Document/DataExplan.php");

include(DOCPATH."App/Lib/Cimarkdown.class.php");         //加载markdown类

$S = \Seter\Seter::getInstance();       //实例化


header("Content-Type:text/html; charset=utf-8");
