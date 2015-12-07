<?php

class user extends Controller {
/*通常操作

'po',       //post  有post
'ed',       //修改
'de',       //删除
'json',     // json
'vf',       //显示
 * */

    //基于页面

    //提交数据
    public function doGrouplist_post($params)
    {
        $res = $this->request->post;
        if(!$res['groupname']){
            echo json_encode([
                'code' =>-200,
                'msg' =>'请填写组名'
            ]);
            exit;
        }
        $res['groupchr'] = $res['groupchr']?:'zero';
        $res['sort']    = intval($res['sort']);
        $res['enable']  = 1;
        $this->table->g_group->insert($res);
        echo json_encode([
            'code' =>200,
            'msg' =>'ok'
        ]);
        exit;
    }


    public function doGrouplist_de($params)
    {
        $id = intval($params);
        $this->table->g_group->where("groupid =  $id")->delete();
        $this->redirect('/s/user/grouplist/');
    }


    //编辑数据提交
    public function doGrouplist_ed_post($params)
    {
        $res['groupname'] = $this->request->post['groupname'];
        $res['groupchr'] = $this->request->post['groupchr'];
        $res['sort'] = $this->request->post['sort'];
        $id = $this->request->post['groupid'];
        $this->table->g_group->where("groupid =  $id")->update($res);

        echo json_encode([
            'code' =>200,
            'msg' =>'ok'
        ]);
        exit;
    }

    //dialog 中的用户组编辑
    public function doGrouplist_ed($params)
    {
        $params = $params?:0;
        $this->display('Grouplist_edit',[
            'res' =>    $this->table->g_group->where("groupid =  $params")->getrow(),
        ]);
    }


    //默认页面
    public function doGrouplist($params){
        $this->display('',[
            'rc'=> $this->table->g_group->order("sort desc,groupid desc ")->getall(),
            'title'=>'用户列表'
        ]);
    }




}
