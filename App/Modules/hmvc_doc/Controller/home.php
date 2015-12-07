<?php


/**
  '*'     //所有
  '@'     //登陆用户
  'A'     //管理员
  'G'     //游客
  '?'     //查询数据库
 */

class home extends BaseController {

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


    /**
     * 综合页
     */
    public function doIndex(){

        $params = $this->params['bookid']?intval($this->params['bookid']):1;

        //计算        运算
        $booknode  = $this->table->g_booknode->where("bookid = '$params' and enable = 1")->order(" sort desc,nodeid desc")->getall();
        $Cimarkdown = new Cimarkdown();
        foreach($booknode as $key=>$value){
            //$booknode[$key]['nr']       = $Cimarkdown->markit($booknode[$key]['nr']);
            //$booknode[$key]['nr']       = htmlentities($booknode[$key]['nr']);
            $booknode[$key]['nrcode']   = $Cimarkdown->markit($booknode[$key]['nrcode']);
        }
        foreach($booknode as $key=>$value){
            if($value['preid'] ==0){
                //节点
                $node[] = $value;
            }else{
                $node_c[$value['preid']][] = $value;  //child
            }
        }
        $node = $node?:[];
        foreach($node as $key=>$value){
            $node[$key]['child'] = $node_c[$value['nodeid']];
        }

        //========================================
        $this->display('',[
            'booklist'   => $this->table->g_book->where("enable = 1")->getall()?:[],
            'node'       => $node,
            'book'       => $this->table->g_book->where("bookid = $params")->getrow()?:[]
        ]);
    }





}
