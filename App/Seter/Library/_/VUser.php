<?php

namespace Seter\Library;
//用户模型
/*
 * 暂时的功能局限到获取自己的信息
 * 调用
 * \Seter\Seter::getInstance()->user->isguest()
 * \Seter\Seter::getInstance()->user->myinfo()
 * \Seter\Seter::getInstance()->user->mygroup()
 *
 * //操作
 * //========================================
 * add edit     以后再写
 * //========================================
 * login
 * logout
 * isguest
 * islogin

 *
 * uname
 * tnamne
 * groupid
 * myinfo
 *
 *
 * */
class VUser
{

    public $loginurl    = '/u/home.login';
    public $logout      = '/u/home.loginout';
    public $logingo     = '/u/home.index';

    /*
     * =============================================================
     *     //针对当前用户
     * =============================================================
     * */
    public $tablename   = 'v_user';
    public $uid         = 'uid';
    public $fileduname  = 'uname';
    public $filedtname  = 'tname';
    public $filedpwd    = 'pwd';
    public $filedauthkey= 'authkey';

    public $filedgroupid= 'groupid';
    public $filedenable = 'enable';

    public $fileloginip = 'logip';
    public $filelogintm = 'logtime';
    //* =============================================================
    public $identity = array();
    public $isguest = true;


    public function __construct()
    {
        $this->S = \Seter\Seter::getInstance();
        $this->isguest = $this->isguest();
    }

//    public function getusergroup(){
//    }
//    public function getuserlist($page=1,$pagesize=30){
//    }
//    //
//    public function getuserinfo($uid=0){
//    }


//    /*
//     * =============================================================
//     * flit enable/groupid
//     * =============================================================
//     * */
//    public function enable(){
//        return $this;
//    }
//
//    public function group(){
//        return $this;
//    }

    //登陆
    public function login($uname,$pwd)
    {
        $tablename = $this->tablename;
        if($this->Isnotempty($uname) && $this->Isnotempty($pwd)){
            $uname = \Sham::saddslashes($uname);
            $row = $this->S->table->$tablename->where($this->fileduname." = '{$uname}'")->getrow();
            if(empty($row)){
                $this->S->json = true;
                $this->S->jsonarr = array(
                    'code'=>-200,
                    'msg'=>'户名不存在',
                );
                return false;
            }else{

                if($row[$this->filedpwd] == $this->S->pwdhash($pwd)){
                    //禁用的用户
                    if($row[$this->filedenable]!=1){
                        $this->S->json = true;
                        $this->S->jsonarr = array(
                            'code'=>-200,
                            'msg'=>'无效用户',
                        );
                        return false;
                    }
                    //更改登陆信息
                    $ar = array(
                        $this->fileloginip  =>  \Sham::GetIP(),
                        $this->filelogintm  =>  \Sham::T(),
                    );
                    //更改数据库激励
                    $this->S->table->$tablename->where($this->fileduname." = '{$uname}'")->update($ar);
                    //日志记录

                    //dolog
                    //算法验证保证COOKIE安全
                    //$filedauthkey  $filedgroupid
                    // 604800 = 7*24*60*60
                    //路径 //可以通用
                    $tm = time();
                    $signature = \Sham::signnature($row[$this->fileduname].$row[$this->filedtname].$row[$this->filedauthkey].$row[$this->filedgroupid].$tm);;
                    setCookie('vuser_uname',$row[$this->fileduname],$tm+604800,'/');
                    setCookie('vuser_tname',$row[$this->filedtname],$tm+604800,'/');
                    setCookie('vuser_authkey',$row[$this->filedauthkey],$tm+604800,'/');
                    setCookie('vuser_groupid',$row[$this->filedgroupid],$tm+604800,'/');

                    setCookie('vuser_tm',$tm,$tm+604800,'/');                     //记录时间
                    setCookie('vuser_signature',$signature,$tm+604800,'/');      //签名算法
                    return true;
                }else{
                    $this->S->json = true;
                    $this->S->jsonarr = array(
                        'code'=>-200,
                        'msg'=>'密码错',
                    );
                    return false;
                }


            }
        }else{
            $this->S->json = true;
            $this->S->jsonarr = array(
                'code'=>-200,
                'msg'=>'用户名密码不能为空',
            );
            return false;
        }
    }

    //登出
    public function logout()
    {
        setCookie('vuser_uname',$row[$this->fileduname],$tm-1,'/');
        setCookie('vuser_tname',$row[$this->filedtname],$tm-1,'/');
        setCookie('vuser_authkey',$row[$this->filedauthkey],$tm-1,'/');
        setCookie('vuser_groupid',$row[$this->filedgroupid],$tm-1,'/');

        setCookie('vuser_tm',$tm,$tm-1,'/');                     //记录时间
        setCookie('vuser_signature',$signature,$tm-1,'/');      //签名算法
        return true;
    }


    public function Validator()
    {
        return true;
    }



    //
    public function identity()
    {
    }

    public function mygroup()
    {
    }

    public function myinfo()
    {
    }



    public function islogin()
    {
        $uname      = cookie('vuser_uname');
        $tname      = cookie('vuser_tname');
        $authkey    = cookie('vuser_authkey');
        $groupid    = cookie('vuser_groupid');
        $tm         = cookie('vuser_tm');             //记录时间
        $signature  = cookie('vuser_signature');      //签名算法
        if($signature == \Sham::signnature($uname.$tname.$authkey.$groupid.$tm)){
            return true;
        }else{
            return false;
        }
    }

    public function isguest()
    {
        return !$this->islogin();
    }

//    public function __set($a, $b) {
//    }
//    public function __get($tablename) {
//    }


    //是否空 存在返回true
    public function Isnotempty($str)
    {
        if(empty($str)){
            return false;
        }else{
            return true;
        }
    }

    //用户表标准格式
    public function columns()
    {
        /*
mysql> show columns from v_user;
+-------------+-------------+------+-----+---------+----------------+
| Field       | Type        | Null | Key | Default | Extra          |
+-------------+-------------+------+-----+---------+----------------+
| uid         | int(11)     | NO   | PRI | NULL    | auto_increment |
| uname       | varchar(32) | NO   | UNI | NULL    |                |
| tname       | varchar(32) | YES  |     | NULL    |                |
| pwd         | varchar(64) | NO   |     | NULL    |                |
| groupid     | int(11)     | YES  |     | NULL    |                |
| authKey     | varchar(64) | YES  |     | NULL    |                |
| accessToken | varchar(64) | YES  |     | NULL    |                |
| logtime     | int(11)     | YES  |     | NULL    |                |
| logip       | varchar(64) | YES  |     | NULL    |                |
| enable      | tinyint(1)  | NO   |     | 0       |                |
+-------------+-------------+------+-----+---------+----------------+
10 rows in set (0.01 sec)
        */
    }

    /*
     * 调试用
     * */
    public function display()
    {
        echo '<hr>';
        echo 'cookie';
        echo '<br>uname:' . cookie('vuser_uname');
        echo '<br>tname:' . cookie('vuser_tname');
        echo '<br>authkey:' . cookie('vuser_authkey');
        echo '<br>groupid:' . cookie('vuser_groupid');

        echo '<br>tm:' . cookie('tm');             //记录时间
        echo '<br>signature:' . cookie('vuser_signature');      //签名算法

        echo '<hr>';
        echo 'signnature';
        echo '<br>' . \Sham::signnature(
                cookie('vuser_uname')
                .cookie('vuser_tname')
                .cookie('vuser_authkey')
                .cookie('vuser_groupid')
                .cookie('vuser_tm')
            );
        echo '<hr>';
        echo 'islogin';
        echo $this->islogin();;
        echo '<hr>';
        echo 'isguest';
        echo $this->isguest();;
        echo '<hr>';
        echo ' var isguest';
        echo $this->isguest;;

    }

}

