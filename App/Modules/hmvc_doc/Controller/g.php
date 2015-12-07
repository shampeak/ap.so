<?php


/**
  '*'     //所有
  '@'     //登陆用户
  'A'     //管理员
  'G'     //游客
  '?'     //查询数据库
 */

class g extends BaseController {

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
    public function doIndex($params){
        $list = $this->G('debug.show');          //调试

        //\G\Geter::getInstance()->get();
//        D($list);
//        exit;

        //========================================
        $this->display('',[
            'list'  =>  $list,
        ]);
    }





}
