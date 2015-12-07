<?php

class user extends Controller {
/*通常操作
delete=999     //删除

 * */



    //根据情况进行跳转
    public function doUsereditprofile(){

        if($this->ispost){
            $uid = $this->user->getuserinfo()['uid'];
            //更改用户信息
            $res = $this->request->post;
            $this->table->dy_user->where("uid = $uid")->update($res);

            echo json_encode([
                'code' =>200,
                'msg' =>'ok'
            ]);
            exit;
        }
        $this->display('',[
            'title'=>'用户个人信息'
        ]);
    }




}
