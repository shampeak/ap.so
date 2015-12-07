<?php
class home extends Controller {


    //根据情况进行跳转
    public function doIndex(){

        if(!$this->user->islogin()){
            $this->Redirect('/home/login');
//        }elseif($this->user->islock()){
//            $this->Redirect('/s/home/locked');
        }else{
            $this->Redirect('/s/');
        }
    }

    //登陆
    public function doLogin(){
        if($this->user->islogin()){
            R('/s');
        }
        if($this->ispost){
            $this->model->UserModel->signin();
        }
        $this->display('',[
            'title'=>'登陆',
        ]);       //默认的index.php
    }

    //退出登陆
    public function doLogout()
    {
        $this->model->UserModel->signout();
        $this->Redirect('/');
    }



    //退出登陆
    public function doSuper_POST()
    {
        $this->model->UserModel->signout();
        $this->Redirect('/');
    }












    //用户组enable变换
    public function doGroupenablechange()
    {
        $groupid = $this->request->post['groupid'];
        $res['enable'] = $this->request->post['enable']?0:1;
        $this->table->g_group->where("groupid =  $groupid")->update($res);
        echo json_encode([
            'code'  => 200,
            'msg'   => '完成',
        ]);
        exit;
    }

    //仪表盘调用
    public function doGetdbused()
    {

        $sql = "select table_name
                from information_schema.tables
                where table_schema='{$this->db->Config['database']}' and table_type='base table'";
        $rc = $this->db->getcol($sql);
        foreach($rc as $value){
            $mc[] = [
                'table' => $value,
                'val'   => intval($this->table->$value->getcount())
            ];
        }
        echo json_encode($mc);
        exit;
    }

//
//    //404错误
//    public function doE404(){
//        $this->display('',[
//            'title'=>'错误',
//        ]);       //默认的index.php
//    }
//
//    public function doProfile()
//    {
//        echo '修改个人资料';
//    }
//
//    //帮助
//    public function doSet(){
//        echo '设置';
//    }
//
//
//    //帮助
//    public function doHelp(){
//        echo '帮助';
//    }
//
//    //锁定
//    public function doLocked(){
//        $this->display('',[
//            'title'=>'锁定',
//        ]);       //默认的index.php
//    }
//
//
//
//
//

















    public function doDis(){
        //默认跳转到s模块
        echo '<pre>
1 : 后台
2 :    --- 接口管理 [登陆]
2 :    --- 文档管理 [登陆]
2 :    --- 个人管理 [登陆]
3 : 接口

仪表盘用作系统的各项数据统计
管理员系统具有严格的权限判断机制，只允许特定的账号访问
文档，模块和框架同步进行

在系统建设中，不断完善框架/文档/模块
</pre>';
    }

}
