<?php
//---------------------------------------------------
//载入Sham\Wise
include("../App/Helper.php");
include("../vendor/autoload.php");
//---------------------------------------------------
include '../Grace/Application.php';

define('APPROOT','../../App/');

Application::run();

//所有请求都请求道 GracePHP::RUN 下面

/*
<li>所有的请求都会进入Application的run方法,整个请求到相应返回的生命周期都是在这个方法中进行的。</li>
<li>在Application的run方法中会生成Router对象。</li>
<li>根据Router对象，会生成Request对象，所有的请求参数都会包装在Request里面。</li>
<li>把生成的Request对象传递给Caller对象，负责调用具体的接口(这里既可以是Controller，也可以实现为RPC)。</li>
<li>然后接口生成Response对象。</li>
<li>最后根据项目的需要，把Response对象转换为你所需要的格式，返回给客户端。</li>
 *
 */