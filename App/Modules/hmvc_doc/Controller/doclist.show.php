<?php


/**
  '*'     //所有
  '@'     //登陆用户
  'A'     //管理员
  'G'     //游客
  '?'     //查询数据库
 */

class doclist extends BaseController {

    public function behaviors()
    {

        return [
            'access' => [
                'only' => [ 'index'],
                'rules' => [
                    [
                        'actions' => ['signout'],
                        'ex' =>[],
                        'allow' => true,
                        'roles' => ['G'],
                    ],
                    [
                        'actions' => ['main'],
                        'ex' =>[],
                        'allow' => true,
                        'roles' => ['*'],
                    ],
                ],
            ],
        ];
    }

    public function doShow_POST()
    {

        //编辑操作提交
        $nodeid = $_POST['nodeid'];
        $bookid = $_POST['bookid'];

        unset($_POST['bookid']);
        $this->table->g_booknode->where("nodeid = '$nodeid'")->update($_POST);
        $res['code'] = 200;
        $res['msg'] = '操作成功';

        echo json_encode($res);
//        R("/doc/doclist/index?bookid={$bookid}");
 //       exit;

//        echo 123;
    }
    /**
     * 综合页
     */
    public function doShow(){

        $bookid = $this->params['bookid']?intval($this->params['bookid']):0;
        $nodeid = $this->params['bookid']?intval($this->params['nodeid']):0;
//计算        运算
        $node  = $this->table->g_booknode->where("bookid = '$bookid' and nodeid = '$nodeid'")->getrow();
        //========================================
        $this->display('',[
            'booklist'   => $this->table->g_book->where("enable = 1")->getall()?:[],
            'node'       => $node,
            'prelist'    => $this->table->g_booknode->colm("nodeid,title")->where("preid = 0 and bookid= $bookid")->getall()?:[]
        ]);
    }





}
