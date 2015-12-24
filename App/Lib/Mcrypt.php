<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/23 0023
 * Time: 11:23
 */


//对称算法
define('Mcrypt_KEY',1233);


class Mcrypt{
    public static function encrypt($code){

        return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5(Mcrypt_KEY), $code, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));

    }
    public static function decrypt($code){

        return mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5(Mcrypt_KEY), base64_decode($code), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND));

    }
}