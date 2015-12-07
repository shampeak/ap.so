<?php


/**
 * ?  “访客”
 * @  “已授权“
 */
class user extends BaseController {

    public function doUserimage(){

        //-----------------------------------------------------------------
        if(empty($_FILES['tfile']['name'])) St::J(-200, 'error');        //文件名空
        //接收数据上传文件
        //-----------------------------------------------------------------
        $dirp = './A/upload/v1/'.date("Ym").'/';
        !is_dir($dirp) && @mkdir($dirp);
        $dirp = './A/upload/v1/'.date("Ym").'/'.date("d").'/';
        !is_dir($dirp) && @mkdir($dirp);

        $extname = pathinfo($_FILES['tfile']['name'], PATHINFO_EXTENSION);

        //-----------------------------------------------------------------
        $target_path = $dirp . md5($_FILES['tfile']['name']).rand(1000000,9999999).'.'.$extname;
        //-----------------------------------------------------------------
        if(move_uploaded_file($_FILES['tfile']['tmp_name'], $target_path)) {
            $refile = $target_path;
            $msg = " 上传成功";
            St::jsonres($refile);
            //-----------------------------------------------------------------
            St::J(200, 'succeed');
        }  else{
            $refile = "";
            $msg = " error, please try again!" . $_FILES['tfile']['error'];
            //-----------------------------------------------------------------
            St::J(200, $msg);
        }
//        $this->data($refile);
//        $this->msg($msg);
        St::jsonres($refile);
        //-----------------------------------------------------------------
        St::J(200, 'succeedu');


        //=======================================
        St::J(200,'登陆成功');
    }


}
