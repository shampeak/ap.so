<?php

//hook

class BaseController extends Controller{

    public function __construct()
    {
        parent::__construct();
    }


    public function _init(){
        header("Content-Type:text/html; charset=utf-8");
        //$this->rbac->run($this->getaccessRules());
    }


//    public function __DisplayPre(){
//    }


    public function behaviors()
    {

        return [
            'access' => [
                'only' => [ 'index'],
                'rules' => [
                    [
                        'actions' => ['signout'],
                        'allow' => true,
                        'roles' => ['G'],
                    ],
                    [
                        'actions' => ['main'],
                        'allow' => true,
                        'roles' => ['*'],
                    ],
                ],
            ],
        ];
    }








//        //+--------------------------------------------------
//        //+--------------------------------------------------
//        //+--------------------------------------------------
//        //+--------------------------------------------------
//        //+--------------------------------------------------
//        //+--------------------------------------------------
//        //+--------------------------------------------------








//    protected function _init(){
//        header("Content-Type:text/html; charset=utf-8");
//        //+--------------------------------------------------
//        $this->rbac->run($this->getaccessRules());
//        //+--------------------------------------------------
//        if($this->request->post) $this->ispost = true;
//    }


//  '*'     //所有
//  '@'     //登陆用户
//  'A'     //管理员
//  'G'     //游客
//  '?'     //查询数据库
//    protected function _init(){
//        header("Content-Type:text/html; charset=utf-8");
//        if($this->request->post) $this->ispost = true;
//    }


//
//    /**
//     * 基于用户角色的权限控制
//     */
//    protected function getaccessRules()
//    {
//        $this->accessRules['Module']    = $this->router['Module'];
//        $this->accessRules['Controller']= $this->router['Controller'];
//        $this->accessRules['Action']    = $this->router['Action'];
//        $this->accessRules['Isguest'] = 1;
//        $this->accessRules['rules']     = RULES();
//        $this->accessRules['behaviors'] =  $this->behaviors();
////        $this->res['IsAdmin'] = 1;
////        $this->res['groupid'] = 32;
////        $this->res['uname'] = 32;
//        return $this->accessRules;
//    }

//  扩展内容包括
//  内容包括
/**
 * 属性 ispost
 *
 * db
 * table
 * cache
 * user
 * router
 * input
 * model
 * library
 * helper
 * log
 * trace
 * cache
 * ldb
 * debug
 * S
 */

} 
