<?
/**
 * ��G�Ĳ��Դ���
 */
include('../../Grace/Common.php');			//��������
include('../../App/Seter/Bootstrap.php');			//��ڴ���









echo 'mark';
exit;






$m['app'] = G('../../App/Conf.php');
C($m);                              //���������ļ�

$s = \Seter\Seter::getInstance();

$rc = $s->db->getall("select * from dy_user");


D($rc);

