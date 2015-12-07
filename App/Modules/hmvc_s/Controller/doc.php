<?php

class doc extends Controller {


    //根据情况进行跳转
    public function doIndex($params){
//          $this->display('',[
//              'title'     => '文档管理',
//             // 'booklist'  => $this->table->g_book->where("enable = 1")->getall()?:[],
//              'node'  => $node,
//              //'book'  =>  $this->table->g_book->where("bookid = $params")->getrow()?:[],
//          ]);
        $params = $params?intval($params):1;

        $booknode  = $this->table->g_booknode->where("bookid = '$params' and enable = 1")->order(" sort desc,nodeid desc")->getall();

        $Cimarkdown = new Cimarkdown();
        foreach($booknode as $key=>$value){
            $booknode[$key]['nr']       = $Cimarkdown->markit($booknode[$key]['nr']);
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
//D($node);
//exit;


        $this->display('',[
            'title'     => '文档管理',
            'booklist'  => $this->table->g_book->where("enable = 1")->getall()?:[],
            'node'  => $node,
            'book'  =>  $this->table->g_book->where("bookid = $params")->getrow()?:[],
        ]);
    }


}
