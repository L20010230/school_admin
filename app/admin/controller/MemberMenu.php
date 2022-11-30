<?php 
/*
 module:		菜单配置
 create_time:	2022-11-29 13:12:17
 author:		
 contact:		
*/

namespace app\admin\controller;

use app\admin\service\MemberMenuService;
use app\admin\model\MemberMenu as MemberMenuModel;
use think\facade\Db;

class MemberMenu extends Admin {


	/*首页数据列表*/
	function index(){
		if (!$this->request->isAjax()){
			return view('index');
		}else{
			$limit  = $this->request->post('limit', 20, 'intval');
			$offset = $this->request->post('offset', 0, 'intval');
			$page   = floor($offset / $limit) +1 ;

			$where = [];
			$where['menu_name'] = $this->request->param('menu_name', '', 'serach_in');
			$where['url'] = $this->request->param('url', '', 'serach_in');
			$where['redirect'] = $this->request->param('redirect', '', 'serach_in');
			$where['route_url'] = $this->request->param('route_url', '', 'serach_in');
			$where['route_path'] = $this->request->param('route_path', '', 'serach_in');
			$where['pid'] = $this->request->param('pid', '', 'serach_in');
			$where['menu_order'] = $this->request->param('menu_order', '', 'serach_in');
			$where['menu_ico'] = $this->request->param('menu_ico', '', 'serach_in');
			$where['broadside_status'] = $this->request->param('broadside_status', '', 'serach_in');

			$create_time_start = $this->request->param('create_time_start', '', 'serach_in');
			$create_time_end = $this->request->param('create_time_end', '', 'serach_in');

			$where['create_time'] = ['between',[strtotime($create_time_start),strtotime($create_time_end)]];

			$order  = $this->request->post('order', '', 'serach_in');	//排序字段 bootstrap-table 传入
			$sort  = $this->request->post('sort', '', 'serach_in');		//排序方式 desc 或 asc

			$field = 'member_menu_id,menu_name,url,redirect,route_url,route_path,pid,menu_order,menu_ico,broadside_status,create_time';
			$orderby = ($sort && $order) ? $sort.' '.$order : 'member_menu_id desc';

			$res = MemberMenuService::indexList(formatWhere($where),$field,$orderby,$limit,$page);
			return json($res);
		}
	}

	/*添加*/
	function add(){
		if (!$this->request->isPost()){
			return view('add');
		}else{
			$postField = 'menu_name,url,redirect,route_url,route_path,pid,menu_order,menu_ico,broadside_status,create_time';
			$data = $this->request->only(explode(',',$postField),'post',null);
			$res = MemberMenuService::add($data);
			return json(['status'=>'00','msg'=>'添加成功']);
		}
	}

	/*修改*/
	function update(){
		if (!$this->request->isPost()){
			$member_menu_id = $this->request->get('member_menu_id','','serach_in');
			if(!$member_menu_id) $this->error('参数错误');
			$this->view->assign('info',checkData(MemberMenuModel::find($member_menu_id)));
			return view('update');
		}else{
			$postField = 'member_menu_id,menu_name,url,redirect,route_url,route_path,pid,menu_order,menu_ico,broadside_status,create_time';
			$data = $this->request->only(explode(',',$postField),'post',null);
			$res = MemberMenuService::update($data);
			return json(['status'=>'00','msg'=>'修改成功']);
		}
	}

	/*删除*/
	function delete(){
		$idx =  $this->request->post('member_menu_id', '', 'serach_in');
		if(!$idx) $this->error('参数错误');
		try{
			MemberMenuModel::destroy(['member_menu_id'=>explode(',',$idx)],true);
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return json(['status'=>'00','msg'=>'操作成功']);
	}

	/*查看详情*/
	function view(){
		$member_menu_id = $this->request->get('member_menu_id','','serach_in');
		if(!$member_menu_id) $this->error('参数错误');
		$this->view->assign('info',MemberMenuModel::find($member_menu_id));
		return view('view');
	}



}

