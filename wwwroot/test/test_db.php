<?
/**
 * ��G�Ĳ��Դ���
 */
include('../../Grace/Common.php');			//��������
include('../../App/Seter/I.php');			//��ڴ���

$m['app'] = G('../../App/Conf.php');;
C($m);                              //���������ļ�

$db = \Seter\Seter::getInstance()->db;

$rc = $db->getall("select * from dy_user");
D($rc);

