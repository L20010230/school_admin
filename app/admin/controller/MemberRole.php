<?php 
/*
 module:		角色管理
 create_time:	2022-11-29 13:21:14
 author:		
 contact:		
*/

namespace app\admin\controller;

use app\admin\service\MemberRoleService;
use app\admin\model\MemberRole as MemberRoleModel;
use think\facade\Db;

class MemberRole extends Admin {


	/*首页数据列表*/
	function index(){
		if (!$this->request->isAjax()){
			return view('index');
		}else{
			$limit  = $this->request->post('limit', 20, 'intval');
			$offset = $this->request->post('offset', 0, 'intval');
			$page   = floor($offset / $limit) +1 ;

			$where = [];
			$where['role_name'] = $this->request->param('role_name', '', 'serach_in');
			$where['status'] = $this->request->param('status', '', 'serach_in');
			$where['type'] = $this->request->param('type', '', 'serach_in');

			$create_time_start = $this->request->param('create_time_start', '', 'serach_in');
			$create_time_end = $this->request->param('create_time_end', '', 'serach_in');

			$where['create_time'] = ['between',[strtotime($create_time_start),strtotime($create_time_end)]];

			$where['role_menu'] = ['find in set',$this->request->param('role_menu', '', 'serach_in')];

			$order  = $this->request->post('order', '', 'serach_in');	//排序字段 bootstrap-table 传入
			$sort  = $this->request->post('sort', '', 'serach_in');		//排序方式 desc 或 asc

			$field = 'member_role_id,role_name,status,type,create_time,role_menu';
			$orderby = ($sort && $order) ? $sort.' '.$order : 'member_role_id desc';

			$res = MemberRoleService::indexList(formatWhere($where),$field,$orderby,$limit,$page);
			return json($res);
		}
	}

	/*添加*/
	function add(){
		if (!$this->request->isPost()){
			return view('add');
		}else{
			$postField = 'role_name,status,type,create_time,role_menu';
			$data = $this->request->only(explode(',',$postField),'post',null);
			$res = MemberRoleService::add($data);
			return json(['status'=>'00','msg'=>'添加成功']);
		}
	}

	/*修改*/
	function update(){
		if (!$this->request->isPost()){
			$member_role_id = $this->request->get('member_role_id','','serach_in');
			if(!$member_role_id) $this->error('参数错误');
			$this->view->assign('info',checkData(MemberRoleModel::find($member_role_id)));
			return view('update');
		}else{
			$postField = 'member_role_id,role_name,status,type,create_time,role_menu';
			$data = $this->request->only(explode(',',$postField),'post',null);
			$res = MemberRoleService::update($data);
			return json(['status'=>'00','msg'=>'修改成功']);
		}
	}

	/*删除*/
	function delete(){
		$idx =  $this->request->post('member_role_id', '', 'serach_in');
		if(!$idx) $this->error('参数错误');
		try{
			MemberRoleModel::destroy(['member_role_id'=>explode(',',$idx)],true);
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return json(['status'=>'00','msg'=>'操作成功']);
	}

	/*查看详情*/
	function view(){
		$member_role_id = $this->request->get('member_role_id','','serach_in');
		if(!$member_role_id) $this->error('参数错误');
		$this->view->assign('info',MemberRoleModel::find($member_role_id));
		return view('view');
	}



}

