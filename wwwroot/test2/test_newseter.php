<?
/**
 * 对G的测试代码
 */
include('../../Grace/Common.php');			//基础函数
include('../../App/Seter/Bootstrap.php');			//入口代码









echo 'mark';
exit;






$m['app'] = G('../../App/Conf.php');
C($m);                              //建立配置文件

$s = \Seter\Seter::getInstance();

$rc = $s->db->getall("select * from dy_user");


D($rc);

