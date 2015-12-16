<?php

/**
 * 调试输出组件
 */
define('FIREPHP',false);             //控制firephp输出和输入
define('FIREPHP_INFO',false);
define('FIREPHP_WARN',false);
define('FIREPHP_ERROR',false);
define('FIREPHP_TRACE',true);

require_once('../../Grace/FirePHPCore/fb.php');




FB::log('Hello World !'); // 常规记录


\FB::group('Test Group A',['Collapsed'=>true]); // 记录分组
// 以下为按照不同类别或者类型进行信息记录
FB::log('Plain Message');
FB::info('Info Message');
FB::warn('Warn Message');
FB::error('Error Message');
FB::log('Message','Optional Label');
FB::info([1,2,3,5,56], "All Turtles");
FB::groupEnd();

FB::group('Test Group B');
FB::log('Hello World B');
FB::log('Plain Message');
FB::info('Info Message');
FB::warn('Warn Message');
FB::error('Error Message');
FB::log('Message','Optional Label');
FB::groupEnd();

$table[] = array('Col 1 Heading','Col 2 Heading','Col 2 Heading');
$table[] = array('Row 1 Col 1','Row 1 Col 2','Row 1 Col 2');
$table[] = array('Row 2 Col 1','Row 2 Col 2');
$table[] = array('Row 3 Col 1','Row 3 Col 2');
FB::table('Table Label', $table);

FB::trace('123',[1,23,4]);