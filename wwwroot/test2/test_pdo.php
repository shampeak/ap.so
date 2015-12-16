<?
/**
 * 对G的测试代码
 */
include('../../Grace/Common.php');			//基础函数
include('../../App/Seter/I.php');			//入口代码

$m['app'] = G('../../App/Conf.php');;
C($m);                              //建立配置文件

$db = \Seter\Seter::getInstance()->gpdo;
echo 123;
$rc = $db->getAll("select * from dy_user");
D($rc);
D($db->getTablesName());

/**
 * 1 : 要根据动作选择不同的连接池
 * select -> 副表 或镜像表   [定时或触发更新副表]
 * update -> 主表 或主表扩展 [配合任务系统进行]
 * delete -> 主表 或主表扩展 [配合任务系统进行]
 * insert -> 主表 或主表扩展 [配合任务系统进行]
 *
 * 2 : 要根据表,选择不同的连接池
 * tablename
 *
 * 3 : 其他情况进行扩展,比如联合查询,组合查询,等等
 */

