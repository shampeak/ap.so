<?
/**
 * 对G的测试代码
 */
error_reporting(E_ALL ^ E_NOTICE);      //抑制错误

include('../../Grace/Common.php');			//基础函数
include('../../App/Seter/I.php');			//入口代码

$m['app'] = G('../../App/Conf.php');;
C($m);                              //建立配置文件

$d= \G\Geter::getInstance();

//$d->show();                //调试
//$d->display();             //调试

//D($d->get('debug.display'));       //调试
//D($d->get('debug.show'));          //调试
//D($d->get('user.show'));           //调试

D(Ge('user.show'));
