<?
/**
 * ��G�Ĳ��Դ���
 */
error_reporting(E_ALL ^ E_NOTICE);      //���ƴ���

include('../../Grace/Common.php');			//��������
include('../../App/Seter/I.php');			//��ڴ���

$m['app'] = G('../../App/Conf.php');;
C($m);                              //���������ļ�

$d= \G\Geter::getInstance();

//$d->show();                //����
//$d->display();             //����

//D($d->get('debug.display'));       //����
//D($d->get('debug.show'));          //����
//D($d->get('user.show'));           //����

D(Ge('user.show'));
