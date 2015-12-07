<?php

//hook
class BaseController extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function _init(){
        header("Content-Type:text/html; charset=utf-8");
        $this->Model->logc->L();        //开始执行的时候 insert log
        //+--------------------------------------------------
        //在这里判断状态 是否停用 是否调试
        $router = C('Router');
        $chr = $router['method_controller'].'/'.$router['method_action'];
//查询数据库
        $where = "api = '$chr'";
        $row = $this->table->g_userapi->where($where)->getrow();

        if($row['debug']){
            $res = $row['response']?:'{}';
            $res = json_decode($res,true);
            $res['getpost'] = $this->request->post;
            $res['st'] = 'from controll';
//            $res['getpost'] = print_r($this->request->post,true);
            echo json_encode($res);
            exit;
        }

    }

    public function behaviors()
    {

        return [
            'access' => [
                'only' => [],
                'rules' => [
                    [
                        'actions' => ['signout'],
                        'allow' => true,
                        'roles' => ['G'],
                    ],
                ],
            ],
        ];
    }


} 
