<?php
/**
 * 改进 不依赖外部函数和变量
 * */
namespace Seter;
define('SETER_PATH',__DIR__);

include SETER_PATH.'/Core/Base.php';                    //基类
include SETER_PATH.'/Seter.php';                        //基类

\Seter\Seter::registerAutoloader();     //PSR-0

$s = \Seter\Seter::getInstance();

D($s);
//\Seter\Seter::D($s);




/**
 * 目录设定
 * 1 基础类 不能直接使用，需要被继承
 * Fast
 * 2 基础功能类 提供稳定的函数和变量 可以直接使用
 * Base
 * 3 功能类 提供系列功能
 * Library
 * 4 模型 Model
 * 解决问题的模型
 * 5 modules模块
 */
