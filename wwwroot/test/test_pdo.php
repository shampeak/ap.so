<?
/**
 * ��G�Ĳ��Դ���
 */
include('../../Grace/Common.php');			//��������
include('../../App/Seter/I.php');			//��ڴ���

$m['app'] = G('../../App/Conf.php');;
C($m);                              //���������ļ�

$db = \Seter\Seter::getInstance()->gpdo;
echo 123;
$rc = $db->getAll("select * from dy_user");
D($rc);
D($db->getTablesName());

/**
 * 1 : Ҫ���ݶ���ѡ��ͬ�����ӳ�
 * select -> ���� �����   [��ʱ�򴥷����¸���]
 * update -> ���� ��������չ [�������ϵͳ����]
 * delete -> ���� ��������չ [�������ϵͳ����]
 * insert -> ���� ��������չ [�������ϵͳ����]
 *
 * 2 : Ҫ���ݱ�,ѡ��ͬ�����ӳ�
 * tablename
 *
 * 3 : �������������չ,�������ϲ�ѯ,��ϲ�ѯ,�ȵ�
 */

