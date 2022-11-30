<?php 
/*
 module:		账号管理
 create_time:	2022-11-29 11:10:16
 author:		
 contact:		
*/

namespace app\admin\controller;

use app\admin\service\MemberService;
use app\admin\model\Member as MemberModel;
use think\facade\Db;

class Member extends Admin {


	/*首页数据列表*/
	function index(){
		if (!$this->request->isAjax()){
			return view('index');
		}else{
			$limit  = $this->request->post('limit', 20, 'intval');
			$offset = $this->request->post('offset', 0, 'intval');
			$page   = floor($offset / $limit) +1 ;

			$where = [];
			$where['name'] = $this->request->param('name_s', '', 'serach_in');
			$where['user_name'] = $this->request->param('user_name', '', 'serach_in');
			$where['mobile'] = $this->request->param('mobile', '', 'serach_in');
			$where['role'] = $this->request->param('role', '', 'serach_in');

			$create_time_start = $this->request->param('create_time_start', '', 'serach_in');
			$create_time_end = $this->request->param('create_time_end', '', 'serach_in');

			$where['create_time'] = ['between',[strtotime($create_time_start),strtotime($create_time_end)]];

			$order  = $this->request->post('order', '', 'serach_in');	//排序字段 bootstrap-table 传入
			$sort  = $this->request->post('sort', '', 'serach_in');		//排序方式 desc 或 asc

			$field = 'member_id,name,user_name,password,mobile,role,create_time';
			$orderby = ($sort && $order) ? $sort.' '.$order : 'member_id desc';

			$res = MemberService::indexList(formatWhere($where),$field,$orderby,$limit,$page);
			return json($res);
		}
	}

	/*添加*/
	function add(){
		if (!$this->request->isPost()){
			return view('add');
		}else{
			$postField = 'name,user_name,password,mobile,role,create_time';
			$data = $this->request->only(explode(',',$postField),'post',null);
			$res = MemberService::add($data);
			return json(['status'=>'00','msg'=>'添加成功']);
		}
	}

	/*修改*/
	function update(){
		if (!$this->request->isPost()){
			$member_id = $this->request->get('member_id','','serach_in');
			if(!$member_id) $this->error('参数错误');
			$this->view->assign('info',checkData(MemberModel::find($member_id)));
			return view('update');
		}else{
			$postField = 'member_id,name,user_name,password,mobile,role,create_time';
			$data = $this->request->only(explode(',',$postField),'post',null);
			$res = MemberService::update($data);
			return json(['status'=>'00','msg'=>'修改成功']);
		}
	}

	/*删除*/
	function delete(){
		$idx =  $this->request->post('member_id', '', 'serach_in');
		if(!$idx) $this->error('参数错误');
		try{
			MemberModel::destroy(['member_id'=>explode(',',$idx)],true);
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return json(['status'=>'00','msg'=>'操作成功']);
	}

	/*查看详情*/
	function view(){
		$member_id = $this->request->get('member_id','','serach_in');
		if(!$member_id) $this->error('参数错误');
		$this->view->assign('info',MemberModel::find($member_id));
		return view('view');
	}

	/*修改密码*/
	function change_password(){
		if (!$this->request->isPost()){
			$info['member_id'] = $this->request->get('member_id','','serach_in');
			return view('change_password',['info'=>$info]);
		}else{
			$postField = 'member_id,password';
			$data = $this->request->only(explode(',',$postField),'post',null);
			if(empty($data['member_id'])) $this->error('参数错误');
			MemberService::change_password($data);
			return json(['status'=>'00','msg'=>'操作成功']);
		}
	}



}

