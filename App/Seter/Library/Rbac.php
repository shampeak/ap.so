<?php

namespace Seter\Library;

class Rbac{
    public $UD      = true;         //是否进行用户RBAC匹配
    public $run     = true;         //是否继续执行
    public $res     = [];           //规则匹配结果
//  '*'     //所有
//  '@'     //登陆用户
//  'A'     //管理员
//  'G'     //游客
//  '?'     //查询数据库

    public function run($rules = '') {
        echo 'RBAC';
        exit;
        $this->Module       = $rules['Module'];
        $this->Controller   = $rules['Controller'];
        $this->Action       = $rules['Action'];
        $this->p            = [];

        //是否在需要验证的范围内 如果是false 直接跳过
        $this->Actionin     = empty($rules['behaviors']['access']['only'])?true:in_array($this->Action,$rules['behaviors']['access']['only'])?ture:false;
        //$this->Bmarch($rules['rules']['access'])->Umarch($rules['behaviors']['access']);;         //基础行为匹配
        $pary = $this->Umarch($rules['behaviors']['access']['rules'])->Get();;         //基础行为匹配

        if($pary['deny']) errormsg('用户权限不足');
        //====================================================
        return true;
    }

    public function Get()
    {
        //返回匹配结果
        return $this->p;
    }
    /**
     * @param $rules
     * @return bool
     * 匹配用户
     */
    public function Umarch($rulesarr)
    {
        $rulesarr = !empty($rulesarr)?$rulesarr:[];
        if($this->Actionin){            //在范围内的数据
            foreach($rulesarr as $key=>$value){
                if($this->Umarch_do($value)->Umarch_do_user()){
                    return $this;      //匹配上， $this->res则返回
                }
            }
        }
        return $this;
    }

//  '*'     //所有
//  '@'     //登陆用户
//  'A'     //管理员
//  'G'     //游客
//  '?'     //查询数据库
    public function Umarch_do_user()
    {
        if($this->res){
            //用户匹配
            $ck = $this->res['roles'];  //用户验证仓库


            //所有用户
            if(in_array('*',$ck)){
                $this->p = [
                    'deny'  => $this->res['deny'],
                    'allow' => $this->res['allow'],
                ];
                return true;
            }

            //登陆用户
            if(\Seter\Seter::getInstance()->user->islogin()){
                if(in_array('@',$ck)){
                    $this->p = [
                        'deny'  => $this->res['deny'],
                        'allow' => $this->res['allow'],
                    ];
                    return true;
                }

                //管理员
                if(in_array('?',$ck)){      //查询数据库解决
//                    $tablename = "g_accessrules";
//                    $tablename_rulelib = "g_rulelib";
                    //获取表名
                    $tablename = C('Rbacdb')['accessrules'];
                    $tablename_rulelib = C('Rbacdb')['accessrules_lib'];

                    $uname = \Sham::saddslashes(\Seter\Seter::getInstance()->request->cookie['vuser_uname']);
                    $where_ = $this->Module?"rule_module = '$this->Module'":'1';
                    $where_ .= "and rule_action = '$this->Action'
                                and rule_controller = '$this->Controller'
                                and enable = 1";
                    $where = "uname = '$uname' and rid in(
                        select rule_id from $tablename_rulelib where $where_
                    )";

                    $sql = "select * from $tablename where $where";
                    $row = \Seter\Seter::getInstance()->db->getrow($sql);;
                    if($row){
                        $this->p = [
                            'deny'  => $row['deny'],
                            'allow' => $row['allow'],
                        ];
                        return true;
                    }
                }
            }else{      //游客
                if(in_array('G',$ck)){
                    $this->p = [
                        'deny'  => $this->res['deny'],
                        'allow' => $this->res['allow'],
                    ];
                    return true;
                }
            }

            //管理员
            if(\Seter\Seter::getInstance()->user->isadmin()){
                if(in_array('A',$ck)){
                    $this->p = [
                        'deny'  => $this->res['deny'],
                        'allow' => $this->res['allow'],
                    ];
                    return true;
                }
            }



            //+--------------------------------------------
        }
        return false;
    }

    public function Umarch_do($rulesone)
    {
        if(in_array($this->Action,$rulesone['actions'])){      //匹配上了
            $this->res = $rulesone;
        }else{
            $this->res = [];
        }
        return $this;
    }


    public function Umarch_action()
    {

    }

    //+------------------------------------------------
    //base 匹配
    //+------------------------------------------------
    /**
     * @param $rules
     * @return bool
     * 匹配行为
     */
    public function Bmarch($rules)
    {
//        foreach($rules['rules'] as $key=>$value){
//            if($this->Bmarch_do($value)){
//                return $this;      //匹配上， $this->res则返回
//            }
//        }
        return $this;
    }

}

