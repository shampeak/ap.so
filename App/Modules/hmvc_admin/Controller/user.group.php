<?php

namespace Controller;

/**
 * ?  “访客”
 * @  “已授权“
 */


class user extends BaseController {

	public function doGroup_Ed($param){}
	public function doGroup_De($param){}
	public function doGroup_Ext($param){}

	public function doGroup_DialogPost(){
		$id = intval(bus('post')['id']);
		$rc['des'] 		= bus('post')['des'];
		$rc['groupName']= bus('post')['groupname'];
		$rc['groupChr'] = bus('post')['groupchr'];
		sapp('db')->autoExecute('user_group',$rc,'UPDATE','groupId = '.$id);
		echo json_encode([
			'code'=> 200,
			'msg' => '-'
		]);
	}

	public function doGroup_Dialog($param){
		$sql = "select * from user_group where groupId = ".intval($param);
		$res = sapp('db')->getrow($sql);
		view('',[
			'res'=>$res
		]);
	}

	public function doGroup_Delete($param){
		$sql = "delete from user_group where groupId = ".intval($param);
		sapp('db')->query($sql);
		echo json_encode([
			'code'=> 200,
			'msg' => '-'
		]);
	}

	public function doGroup_BoxPost()
	{
		$rc['groupname']= bus('post')['groupname'];
		$rc['groupchr'] = bus('post')['groupchr'];
		$rc['active'] 	= intval(bus('post')['active']);
		$rc['des'] 		= bus('post')['des'];
		$rc['sort'] 	= intval(bus('post')['sort']);
		sapp('db')->autoExecute('user_group',$rc,'INSERT');
		echo json_encode([
			'code'=> 200,
			'msg' => '-'
		]);
		//view();
	}

	//仅仅调试,在模版中用 view('../box/group_box') 进行调用
	public function doGroup_Box()
	{
		view('../box/group_box');
	}

	public function doGroup_States($param)
	{
		$sql = "select active from user_group where groupId = ".intval($param);
		$st = sapp('db')->getone($sql);
		$rc['active'] = $st?0:1;
		sapp('db')->autoExecute('user_group',$rc,'UPDATE','groupId='.intval($param));
		echo json_encode([
			'code'=> 200,
			'msg' => '-'
		]);
	}
	public function doGroupPost()
	{
		$list = bus('post')['s'];
		foreach($list as $key=>$value){
			$value = intval($value);
			$rc['sort'] = $value;
			sapp('db')->autoExecute('user_group',$rc,'UPDATE','groupId = '.$key);
		}
		R('/admin/user/group/');
	}

	public function doGroup(){
		//ruleLib不再管理范围之内,交给专门的程序去处理
		$where = 1;						//去除无效的
		if($_COOKIE['set_get_list'])	$where .= " and active != 0";

		$res = sapp('db')->getall("	select * from user_group
									where $where
									order by sort desc,groupId desc
									");
		view('',[
				'res' => $res
			]);
	}

}




