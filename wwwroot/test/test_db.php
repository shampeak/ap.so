<?
/**
 * 对G的测试代码
 */
include('../../Grace/Common.php');			//基础函数
include('../../App/Seter/I.php');			//入口代码

$m['app'] = G('../../App/Conf.php');;
C($m);                              //建立配置文件

$db = \Seter\Seter::getInstance()->db;

$rc = $db->getall("select * from dy_user");
D($rc);

