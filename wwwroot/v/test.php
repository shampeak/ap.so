<?php
//变换路径的测试
//---------------------------------------------------

include("../../Sham/Helper.php");
include("../../vendor/autoload.php");
//---------------------------------------------------
define('APPROOT','../../App/');
App\Application::run();

//发现某些基于路径的错误
