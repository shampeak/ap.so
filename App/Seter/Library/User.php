<?php

namespace Seter\Library;
//用户模型
/*
 * 暂时的功能局限到获取自己的信息
 * //========================================
 * ->maplist [uid->uname] [uname->uid]
 * -> singup($res)          //注册
 * -> singin($res)          //登陆
 * -> singout()         //登出
 * -> getuserinfo($uname)   //获取用户信息
 * -> deleteuser($uname)    //获取用户信息
 * -> edituser($uname,$res)
 * -> isadmin($uid)
 * -> islogin();            //用户是否已经登陆
 * -> viewtable()           //查看表


     * =================================================
     * 所有操作 ->已经完成的
     * ->signin()->json();      //带状态操作
     * ->signout();
     * ->islogin();
     * ->isadmin();
     * ->isguest();
     * ->getuserinfo();
     *
     *
 * */

class User
{
    /*
     * =============================================================
     * 表信息设置
     * =============================================================
     * */
    public $tablename = '';
    public $uid = '';

    public $fileduname = '';     //'uname';
    public $filedtname = '';      //'tname';
    public $filedpwd = '';  //'pwd';
    public $filedauthkey = '';

    public $filedgroupid = '';
    public $filedenable = '';
    public $filedaccessToken = '';

    public $filedloginip = '';//'logip';
    public $filedlogintm = '';//'logtime';
    public $filedregtime = '';//'logtime';

    //* =============================================================
    public $map = [];
    public $info = [];


    public $row = [];
    public $jsonarr = [];
    public $json = [];


    public function __construct()
    {
        \St::Getcodelist($this->DefaultCoderes());            //1 把code列表传入进去

        $this->S = \Seter\Seter::getInstance();
        $userfield = C('User')['UserField']?:[];
        $field = array_merge($this->UserDefaultField(), $userfield);
        foreach ($field as $key => $value) {    $this->$key = $value;   }
        $this->map['idtouname'] = $this->mapidtouname();
        $this->map['unametoid'] = array_flip($this->map['idtouname']);

//        $this->isguest = $this->isguest();          //是否访客【未登录】
//        $this->islogin = $this->islogin();          //是否登陆
//        $this->isadmin = $this->isadmin();          //是否管理员
//        $this->myinfo = $this->myinfo();            //我的信息
    }

   /**
     * @return array
     * 操作结果状态
     * ->signin()
     */
    public function DefaultCoderes()
    {
        return [
            '0'     => 'ini',
            '200'   => '操作成功',
            '-200' => '用户名密码不能为空',
            '-201' => '密码错误',
            '-202' => '无效用户',
            '-203' => '用户不存在',
        ];
    }



    //登陆
    public function signin($uname,$pwd)
    {

        $tablename = $this->tablename;

        //用户名密码不能为空
        if($this->Isempty($uname) || $this->Isempty($pwd)) {
            \St::jsoncode(-200);  //用户名密码不能为空
            return $this;
        }

        if(!$this->checkname($uname)){
            \St::jsoncode(-203);      //用户不存在
            return $this;
        }

        $row = $this->getuserinfo($uname);
        if($row[$this->filedpwd] != $this->passwordhash($pwd)){
            \St::jsoncode(-201);      //密码错误
            return $this;
        }else{
            //禁用的用户
            if($row[$this->filedenable]!=1){
                \St::jsoncode(-202);      //无效用户
                return $this;
            }
            //更改登陆信息
            $ar = array(
                $this->filedlogintm  =>  \GetIP(),
                $this->filedregtime  =>  \T(),
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
            $signature = $this->signnature($row[$this->fileduname].$row[$this->filedtname].$row[$this->filedauthkey].$row[$this->filedgroupid].$tm);;
            setCookie('vuser_uname',$row[$this->fileduname],$tm+604800,'/');
            setCookie('vuser_tname',$row[$this->filedtname],$tm+604800,'/');
            setCookie('vuser_authkey',$row[$this->filedauthkey],$tm+604800,'/');
            setCookie('vuser_groupid',$row[$this->filedgroupid],$tm+604800,'/');
            setCookie('vuser_tm',$tm,$tm+604800,'/');                     //记录时间
            setCookie('vuser_signature',$signature,$tm+604800,'/');      //签名算法
            \St::jsoncode(200);      //操作成功
            return $this;
        }
    }









    //登出
    public function signout()
    {
        $tm = time();
        setCookie('vuser_uname',$this->fileduname,$tm-1,'/');
        setCookie('vuser_tname',$this->filedtname,$tm-1,'/');
        setCookie('vuser_authkey',$this->filedauthkey,$tm-1,'/');
        setCookie('vuser_groupid',$this->filedgroupid,$tm-1,'/');
        setCookie('vuser_tm',$tm,$tm-1,'/');                        //记录时间
        setCookie('vuser_signature','1234',$tm-1,'/');              //签名算法
        return true;
    }

    /**
     * 验证用户名秒是否正确
     */
//    public function Validator()
//    {
//        return true;
//    }

    /**
     * @return mixed
     * 获取我的用户信息
     */
    public function getuserinfo($uname = '')
    {
        $tablename = $this->tablename;
        $uname = $uname?:$this->S->request->cookie['vuser_uname']?:'';

        if($this->checkname($uname)){
            //用户名监测通过
            $uname = \Sham::saddslashes($uname);
            $row = $this->S->table->$tablename->where("{$this->fileduname} = '$uname'")->getrow();
            //unset($row[$this->filedpwd]);
        }else{
            //没通过
            $row = [];
        };
        return $row;
    }


    /**
     * @return bool
     * 是否访客
     */
    public function isguest()
    {
        return !$this->islogin();
    }

    /**
     * @return bool是否管理员
     */
    public function isadmin()
    {
        if($this->isguest()){
            return false;
        }else{
            $groupid    = $this->S->request->cookie['vuser_groupid'];
            $ar = C('User')['AdminGroupid']?:[];
            if(in_array($groupid,$ar)){
                return true;
            }else{
                return false;
            }
        }
        return false;
    }



    public function islogin()
    {
        $uname      = $this->S->request->cookie['vuser_uname'];
        $tname      = $this->S->request->cookie['vuser_tname'];
        $authkey    = $this->S->request->cookie['vuser_authkey'];
        $groupid    = $this->S->request->cookie['vuser_groupid'];
        $tm         = $this->S->request->cookie['vuser_tm'];             //记录时间
        $signature  = $this->S->request->cookie['vuser_signature'];      //签名算法
        if($signature == $this->signnature($uname.$tname.$authkey.$groupid.$tm)){
            return true;
        }else{
            return false;
        }
    }

    //是否空 存在返回true
    public function Isempty($str)
    {
        return empty($str)?true:false;
    }

    /**
     * @param string $uname
     * 监测用户名是否存在
     */
    public function checkname($uname = '')
    {
        return $this->map['unametoid'][$uname]?true:false;
    }

    //签名验证hash
    public function signnature($tring = '')
    {
        return md5(md5(md5(md5($tring))));
    }

    //密码验证hash
    public function passwordhash($password = '')
    {
        return $password;
    }

    public function mapidtouname()
    {
        $tablename = $this->tablename;
        return $this->S->table->$tablename->colm("{$this->uid},{$this->fileduname}")->getmap();
    }

//    +-----------------------------------------------------------+
//    +-----------------------------------------------------------+
//    +-----------------------------------------------------------+
//    +-----------------------------------------------------------+
//    +-----------------------------------------------------------+
//    +-----------------------------------------------------------+
//    +-----------------------------------------------------------+
//    +-----------------------------------------------------------+
//    +-----------------------------------------------------------+






    public function UserDefaultField()
    {
        return [
            'tablename' => 'dy_user',

            'uid' => 'uid',
            'fileduname' => 'uname',
            'filedtname' => 'tname',
            'filedpwd' => 'pwd',
            'filedauthkey' => 'authkey',            //组织不同系统用户

            'filedgroupid' => 'groupid',
            'filedenable' => 'enable',
            'filedaccessToken' => 'accessToken',    //授权
            'filedloginip' => 'logip',
            'filedlogintm' => 'logtime',

            'filedregtime' => 'regtime',
        ];
    }

    //用户表标准格式
    public function columns()
    {
        /*
mysql> show columns from dy_user;
+-------------+-------------+------+-----+---------+----------------+
| Field       | Type        | Null | Key | Default | Extra          |
+-------------+-------------+------+-----+---------+----------------+
| uid         | int(11)     | NO   | PRI | NULL    | auto_increment |
| uname       | varchar(32) | NO   | MUL | NULL    |                |
| tname       | varchar(32) | YES  |     | NULL    |                |
| pwd         | varchar(32) | YES  |     | NULL    |                |
| groupid     | int(11)     | YES  | MUL | NULL    |                |
| authkey     | varchar(64) | YES  |     | NULL    |                |
| accessToken | varchar(64) | YES  |     | NULL    |                |
| logtime     | int(11)     | YES  |     | NULL    |                |
| logip       | varchar(32) | YES  |     | NULL    |                |
| enable      | tinyint(1)  | YES  | MUL | 1       |                |
| regtime     | int(11)     | YES  |     | NULL    |                |
+-------------+-------------+------+-----+---------+----------------+
11 rows in set (0.02 sec)

CREATE TABLE IF NOT EXISTS `dy_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(32) NOT NULL,
  `tname` varchar(32) DEFAULT NULL,
  `pwd` varchar(32) DEFAULT NULL,
  `groupid` int(11) DEFAULT NULL,
  `authkey` varchar(64) DEFAULT NULL,
  `accessToken` varchar(64) DEFAULT NULL,
  `logtime` int(11) DEFAULT NULL,
  `logip` varchar(32) DEFAULT NULL,
  `enable` tinyint(1) DEFAULT '1',
  `regtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  KEY `enable` (`enable`),
  KEY `groupid` (`groupid`),
  KEY `uname` (`uname`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0;
        */
    }

}

