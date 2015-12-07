<?php
//检索数据库，看是否能找到想匹配的模拟结果输出
$s = \Seter\Seter::getInstance();
$s->model->logc->L();        //开始执行的时候 insert log

$router = C('Router');
$chr = $router['method_controller'].'/'.$router['method_action'];
//查询数据库
$where = "api = '$chr'";
$row = $s->table->g_userapi->where($where)->getrow();
if($row['response']) {
    $res = $row['response'];
    $res = json_decode($res,true);
    //$res['getpost'] = print_r($s->request->post,true);
    $res['getpost'] = $s->request->post;
//    $res['getpost'] = print_r($s->request->post,true);
    $res['st'] = 'from 404';
}else{
    $res = [
        'code'=>404,
        'msg' => 'error 404',
        'st' => 'from 404page'
    ];
}
echo json_encode($res);
exit;