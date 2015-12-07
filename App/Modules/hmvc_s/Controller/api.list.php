<?php

class api extends Controller {

//'po',       //post  有post
//'ed',       //修改
//'de',       //删除
//'json',     // json
//'vf',       //显示


    //日志数据返回 - dialog显示
    public function doList_json($id)
    {
        $id = intval($id);
        $row = $this->table->g_userapi->where("id=$id")->getrow();
        $api = $row['api'];
        if($api){
            $p = explode('/',$api);
            $c = $p[0];
            $a = $p[1];
        }
        $loglist = $this->table->g_log->where("controller = '$c' and action = '$a'")->order("id desc")->limit(5)->getall();
        if($loglist){
            foreach($loglist as $key=>$value){
                if($value['time'])   $loglist[$key]['time'] = unserialize($value['time']);
                if($value['_GET'])   $loglist[$key]['_GET'] = print_r(unserialize($value['_GET']),true);
                if($value['_POST'])  $loglist[$key]['_POST'] = print_r(unserialize($value['_POST']),true);;
                if($value['_FILE'])  $loglist[$key]['_FILE'] = print_r(unserialize($value['_FILE']),true);;
                if($value['router']) $loglist[$key]['router'] = print_r(unserialize($value['router']),true);;
                if($value['sign'])  $loglist[$key]['sign'] = print_r(unserialize($value['sign']),true);;
                $loglist[$key]['__'] = [
                    'id'        => $loglist[$key]['id'],
                    'code'      => $loglist[$key]['code'],
                    'msg'       => $loglist[$key]['msg'],
                    'controller'=> $loglist[$key]['controller'],
                    'action'    => $loglist[$key]['action'],
                    'time'      => $loglist[$key]['time'],
                ];
                $loglist[$key]['__'] = print_r($loglist[$key]['__'],true);
            }
        }

        //显示日志
        $this->display('list_json',[
            'list'=>$loglist,
            'title'=>'日志'
        ]);
    }


    //测试用 - 》页面右侧有日志
    public function doList_vf($id){
        $id = intval($id);
        $this->display('list_vf',[
            'row'=>$this->table->g_userapi->where("id = $id")->getrow(),
            'title'=>'用户列表'
        ]);
    }





    //更改状态 【调试开关】
    public function doList_de_post($params){
        $id = intval($params);
        $row = $this->table->g_userapi->where("id = $id")->getrow();
        $res['debug'] = $row['debug']?0:1;
        $this->table->g_userapi->where("id = $id")->update($res);
        echo json_encode([
            'code'=>200,
            'msg'=>'OK'.$params,
        ]);
    }



    //修改保存
    public function doList_ed_post(){
        $res = $this->request->post;
        $this->table->g_userapi->where("id = {$res['id']}")->update($res);
        echo json_encode([
            'code' => 200,
            'msg'  => 'ok'
        ]);
        exit;
    }



    //修改一条记录 - 显示修改界面
    public function doList_ed($id = 0){
        $id = intval($id);

        $this->display('list_edit',[
            'row'=>$this->table->g_userapi->where("id = $id")->getrow(),
            'title'=>'用户列表'
        ]);

    }

    //添加新数据
    public function doList_post(){
        $res = $this->request->post;
        if(!$res['name']){
            $re = [
                'code'=>-200,
                'code'=>'名称必须填写',
            ];
            echo json_encode($re);
            exit;
        }
        $this->table->g_userapi->insert($res);
        echo json_encode([
            'code'=>200,
            'msg'=>'操作完成'
        ]);
        exit;
    }

    //根据情况进行跳转
    public function doList(){
        $this->display('',[
            'rc'=>$this->G('table.g_userapi_all'),      //userapi 列表数据
            'title'=>'用户列表'
        ]);
    }







}
