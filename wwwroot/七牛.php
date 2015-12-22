<?php
//---------------------------------------------------
//载入Sham\Wise

include("../Sham/Helper.php");
include("../vendor/autoload.php");
//---------------------------------------------------
define('APPROOT','../App/');


// 引入鉴权类
use Qiniu\Auth;

// 引入上传类
use Qiniu\Storage\UploadManager;

// 需要填写你的 Access Key 和 Secret Key
$accessKey = 'beyoQyVkDK9pFJmmQVHP64U_Pxq3p8_6otb6dz-X';
$secretKey = 'AUKiQRrE_iKTsUJhj9GjJEePPetYQQQI5HMpLdMj';

// 构建鉴权对象
$auth = new Auth($accessKey, $secretKey);

// 要上传的空间
$bucket = 'sham';

// 生成上传 Token
$token = $auth->uploadToken($bucket);

// 要上传文件的本地路径
$filePath = './v.JPG';

// 上传到七牛后保存的文件名
$key = 'my-php-logo.png';

// 初始化 UploadManager 对象并进行文件的上传。
$uploadMgr = new UploadManager();
list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
echo "\n====> putFile result: \n";
if ($err !== null) {
    var_dump($err);
} else {
    var_dump($ret);
}

//App\Application::run();





//所有请求都请求道 Application::RUN 下面
