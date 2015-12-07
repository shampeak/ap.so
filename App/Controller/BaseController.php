<?php
/**
 * Class BaseController

'po',       //post  有post
'cg',       //修改
'de',       //删除
'json',     // json
'vf',       //显示

//hook
 */

class BaseController extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function G($str = ''){       //OK,获取到固化数据的路由字段
        return $this->Geter->get($str);
    }

    /**
     * 前置hook
     */
//    public function _init(){
//        header("Content-Type:text/html; charset=utf-8");
//    }

    public function __DisplayPre(){
//        $this->assign('router',123);      //给模板赋值
//        $this->assign('env',123);
//        $this->assign('qwre',123);
//            $data['user']    = $this->user->getuserinfo();
    }



//  '*'     //所有
//  '@'     //登陆用户
//  'A'     //管理员
//  'G'     //游客
//  '?'     //查询数据库

    public function behaviors()
    {

        return [
            'access' => [
                'only' => ['index'],
//                'only' => [ 'login','logout', 'signup','main'],
                'rules' => [
                    [
                        'actions'   => ['index'],
                        'allow'     => true,
                        'roles'     => ['*'],
                    ],
//                    [
//                        'actions' => ['signout'],
//                        'allow' => true,
//                        'roles' => ['G'],
//                    ],
//                    [
//                        'actions' => ['main'],
//                        'allow' => true,
//                        'roles' => ['*'],
//                    ],
                ],
            ],
        ];
    }





} 
