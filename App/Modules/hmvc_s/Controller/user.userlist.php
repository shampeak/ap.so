<?php

class user extends Controller {
/*通常操作

'po',       //post  有post
'ed',       //修改
'de',       //删除
'json',     // json
'vf',       //显示
 * */



    public function doUserlist_post()
    {
        $res = $this->request->post;
        //重复
        if($this->user->getuserinfo($res['uname'])){
            $mr = [
                'code' =>-200,
                'msg' =>'该用户名存在'
            ];
            echo json_encode($mr);
        }else{
            $this->table->dy_user->insert($res);
            $mr = [
                'code' =>200,
                'msg' =>'操作完成'
            ];
            echo json_encode($mr);
        }
        exit;
    }

    public function doUserlist_vf()
    {
        D('显示日志');
        exit;
    }

    //修改一条记录_保存
    public function doUserlist_ed_post($params)
    {
        //修改用户资料
        $uid = $this->request->post['uid'];
        $pwd = $this->request->post['pwd'];
        $res['tname'] = $this->request->post['tname'];
        $res['groupid'] = $this->request->post['groupid'];

        if($pwd)$res['pwd'] = $pwd;
        $this->table->dy_user->where("uid = $uid")->update($res);
        echo json_encode([
            'code'=>200,
            'msg' =>'ok',
        ]);
        exit;

    }

    //修改一条记录
    public function doUserlist_ed($params)
    {
        $uid = intval($params);

        $this->display('userlist_ed',[
            'title'     =>'用户列表',
            'grouplist' => $this->table->g_group->getall(),
            'row'      => $this->table->dy_user->where("uid = $uid")->getrow(),
        ]);
    }

    //修改一条记录的状态
    public function doUserlist_cf($params)
    {
        $uid = intval($params);
        $row = $this->table->dy_user->where("uid = $uid")->getrow();
        $res['enable'] = $row['enable']?0:1;
        $this->table->dy_user->where("uid = $uid")->update($res);
        echo json_encode([
            'code'=>200,
            'msg' =>'ok',
        ]);
        exit;

    }

    //删除一条记录
    public function doUserlist_de($params)
    {
        $uid = intval($params);
        $this->table->dy_user->where("uid = $uid")->delete();
        echo json_encode([
            'code'=>200,
            'msg' => $params,
        ]);
    }

        //根据情况进行跳转
    public function doUserlist(){

        $this->display('',[
            'title'     =>'用户列表',
            'grouplist' => $this->table->g_group->getall(),
            'list'      => $this->table->dy_user->order("uid desc")->getall(),
        ]);
    }



}
