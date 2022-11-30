<?php 
/*
 module:		菜单配置
 create_time:	2022-11-30 10:30:41
 author:		
 contact:		
*/

namespace app\api\controller;

use app\api\service\MemberMenuService;
use app\api\model\MemberMenu as MemberMenuModel;
use think\exception\ValidateException;
use think\facade\Db;
use think\facade\Log;

class MemberMenu extends Common {


	/**
	* @api {get} /MemberMenu/index 01、菜单列表
	* @apiGroup MemberMenu
	* @apiVersion 1.0.0
	* @apiDescription  菜单列表

	* @apiHeader {String} Authorization 用户授权token
	* @apiHeaderExample {json} Header-示例:
	* "Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org"

	* @apiParam (输入参数：) {int}     		[limit] 每页数据条数（默认20）
	* @apiParam (输入参数：) {int}     		[page] 当前页码
	* @apiParam (输入参数：) {string}		[menu_name] 菜单名称 
	* @apiParam (输入参数：) {string}		[url] 菜单URL 
	* @apiParam (输入参数：) {string}		[redirect] 重定向 
	* @apiParam (输入参数：) {string}		[route_url] 路由name 
	* @apiParam (输入参数：) {string}		[route_path] 路由组件路径 
	* @apiParam (输入参数：) {string}		[pid] 上级菜单 
	* @apiParam (输入参数：) {string}		[menu_ico] 菜单图标 
	* @apiParam (输入参数：) {int}			[broadside_status] 侧边显示 否|1,是|2
	* @apiParam (输入参数：) {string}		[create_time_start] 创建时间开始
	* @apiParam (输入参数：) {string}		[create_time_end] 创建时间结束
	* @apiParam (输入参数：) {string}		[cascader] 上级菜单反写数据 

	* @apiParam (失败返回参数：) {object}     	array 返回结果集
	* @apiParam (失败返回参数：) {string}     	array.status 返回错误码 201
	* @apiParam (失败返回参数：) {string}     	array.msg 返回错误消息
	* @apiParam (成功返回参数：) {string}     	array 返回结果集
	* @apiParam (成功返回参数：) {string}     	array.status 返回错误码 200
	* @apiParam (成功返回参数：) {string}     	array.data 返回数据
	* @apiParam (成功返回参数：) {string}     	array.data.list 返回数据列表
	* @apiParam (成功返回参数：) {string}     	array.data.count 返回数据总数
	* @apiSuccessExample {json} 01 成功示例
	* {"status":"200","data":""}
	* @apiErrorExample {json} 02 失败示例
	* {"status":" 201","msg":"查询失败"}
	*/
	function index(){
		$limit  = $this->request->get('limit', 20, 'intval');
		$page   = $this->request->get('page', 1, 'intval');

		$where = [];
		$where['menu_name'] = $this->request->get('menu_name', '', 'serach_in');
		$where['url'] = $this->request->get('url', '', 'serach_in');
		$where['redirect'] = $this->request->get('redirect', '', 'serach_in');
		$where['route_url'] = $this->request->get('route_url', '', 'serach_in');
		$where['route_path'] = $this->request->get('route_path', '', 'serach_in');
		$where['pid'] = $this->request->get('pid', '', 'serach_in');
		$where['menu_order'] = $this->request->get('menu_order', '', 'serach_in');
		$where['menu_ico'] = $this->request->get('menu_ico', '', 'serach_in');
		$where['broadside_status'] = $this->request->get('broadside_status', '', 'serach_in');

		$create_time_start = $this->request->get('create_time_start', '', 'serach_in');
		$create_time_end = $this->request->get('create_time_end', '', 'serach_in');

		$where['create_time'] = ['between',[strtotime($create_time_start),strtotime($create_time_end)]];
		$where['cascader'] = $this->request->get('cascader', '', 'serach_in');

		$field = '*';
		$orderby = 'member_menu_id desc';

		$res = MemberMenuService::indexList(formatWhere($where),$field,$orderby,$limit,$page);
		return $this->ajaxReturn($this->successCode,'返回成功',htmlOutList($res));
	}

	/**
	* @api {post} /MemberMenu/add 02、添加菜单
	* @apiGroup MemberMenu
	* @apiVersion 1.0.0
	* @apiDescription  添加

	* @apiHeader {String} Authorization 用户授权token
	* @apiHeaderExample {json} Header-示例:
	* "Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org"
	* @apiParam (输入参数：) {string}			menu_name 菜单名称 (必填) 
	* @apiParam (输入参数：) {string}			url 菜单URL (必填) 
	* @apiParam (输入参数：) {string}			redirect 重定向 
	* @apiParam (输入参数：) {string}			route_url 路由name (必填) 
	* @apiParam (输入参数：) {string}			route_path 路由组件路径 
	* @apiParam (输入参数：) {string}			pid 上级菜单 
	* @apiParam (输入参数：) {int}				menu_order 显示顺序 (必填) 
	* @apiParam (输入参数：) {string}			menu_ico 菜单图标 
	* @apiParam (输入参数：) {int}				broadside_status 侧边显示 (必填) 否|1,是|2
	* @apiParam (输入参数：) {string}			cascader 上级菜单反写数据 

	* @apiParam (失败返回参数：) {object}     	array 返回结果集
	* @apiParam (失败返回参数：) {string}     	array.status 返回错误码  201
	* @apiParam (失败返回参数：) {string}     	array.msg 返回错误消息
	* @apiParam (成功返回参数：) {string}     	array 返回结果集
	* @apiParam (成功返回参数：) {string}     	array.status 返回错误码 200
	* @apiParam (成功返回参数：) {string}     	array.msg 返回成功消息
	* @apiSuccessExample {json} 01 成功示例
	* {"status":"200","data":"操作成功"}
	* @apiErrorExample {json} 02 失败示例
	* {"status":" 201","msg":"操作失败"}
	*/
	function add(){
		$postField = 'menu_name,url,redirect,route_url,route_path,pid,menu_order,menu_ico,broadside_status,create_time,cascader';
		$data = $this->request->only(explode(',',$postField),'post',null);
		$res = MemberMenuService::add($data);
		return $this->ajaxReturn($this->successCode,'操作成功',$res);
	}

	/**
	* @api {post} /MemberMenu/update 03、修改菜单
	* @apiGroup MemberMenu
	* @apiVersion 1.0.0
	* @apiDescription  修改
	
	* @apiParam (输入参数：) {string}     		member_menu_id 主键ID (必填)

	* @apiHeader {String} Authorization 用户授权token
	* @apiHeaderExample {json} Header-示例:
	* "Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org"
	* @apiParam (输入参数：) {string}			menu_name 菜单名称 (必填) 
	* @apiParam (输入参数：) {string}			url 菜单URL (必填) 
	* @apiParam (输入参数：) {string}			redirect 重定向 
	* @apiParam (输入参数：) {string}			route_url 路由name (必填) 
	* @apiParam (输入参数：) {string}			route_path 路由组件路径 
	* @apiParam (输入参数：) {string}			pid 上级菜单 
	* @apiParam (输入参数：) {int}				menu_order 显示顺序 (必填) 
	* @apiParam (输入参数：) {string}			menu_ico 菜单图标 
	* @apiParam (输入参数：) {int}				broadside_status 侧边显示 (必填) 否|1,是|2
	* @apiParam (输入参数：) {string}			cascader 上级菜单反写数据 

	* @apiParam (失败返回参数：) {object}     	array 返回结果集
	* @apiParam (失败返回参数：) {string}     	array.status 返回错误码  201
	* @apiParam (失败返回参数：) {string}     	array.msg 返回错误消息
	* @apiParam (成功返回参数：) {string}     	array 返回结果集
	* @apiParam (成功返回参数：) {string}     	array.status 返回错误码 200
	* @apiParam (成功返回参数：) {string}     	array.msg 返回成功消息
	* @apiSuccessExample {json} 01 成功示例
	* {"status":"200","msg":"操作成功"}
	* @apiErrorExample {json} 02 失败示例
	* {"status":" 201","msg":"操作失败"}
	*/
	function update(){
		$postField = 'member_menu_id,menu_name,url,redirect,route_url,route_path,pid,menu_order,menu_ico,broadside_status,cascader';
		$data = $this->request->only(explode(',',$postField),'post',null);
		if(empty($data['member_menu_id'])){
			throw new ValidateException('参数错误');
		}
		$where['member_menu_id'] = $data['member_menu_id'];
		$res = MemberMenuService::update($where,$data);
		return $this->ajaxReturn($this->successCode,'操作成功');
	}

	/**
	* @api {get} /MemberMenu/view 04、查看菜单详情
	* @apiGroup MemberMenu
	* @apiVersion 1.0.0
	* @apiDescription  查看详情
	
	* @apiParam (输入参数：) {string}     		member_menu_id 主键ID
	* @apiParam (输入参数：) {string}     		800px 主键ID
	* @apiParam (输入参数：) {string}     		100% 主键ID

	* @apiHeader {String} Authorization 用户授权token
	* @apiHeaderExample {json} Header-示例:
	* "Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org"

	* @apiParam (失败返回参数：) {object}     	array 返回结果集
	* @apiParam (失败返回参数：) {string}     	array.status 返回错误码 201
	* @apiParam (失败返回参数：) {string}     	array.msg 返回错误消息
	* @apiParam (成功返回参数：) {string}     	array 返回结果集
	* @apiParam (成功返回参数：) {string}     	array.status 返回错误码 200
	* @apiParam (成功返回参数：) {string}     	array.data 返回数据详情
	* @apiSuccessExample {json} 01 成功示例
	* {"status":"200","data":""}
	* @apiErrorExample {json} 02 失败示例
	* {"status":"201","msg":"没有数据"}
	*/
	function view(){
		$data['800px'] = $this->request->get('800px','','serach_in');
		$data['100%'] = $this->request->get('100%','','serach_in');
		$field='member_menu_id,menu_name,url,redirect,route_url,route_path,pid,menu_order,menu_ico,broadside_status,create_time,cascader';
		$res  = checkData(MemberMenuModel::field($field)->where($data)->find());
		return $this->ajaxReturn($this->successCode,'返回成功',$res);
	}

	/**
	* @api {post} /MemberMenu/soft_delete 05、删除菜单
	* @apiGroup MemberMenu
	* @apiVersion 1.0.0
	* @apiDescription  删除菜单

	* @apiHeader {String} Authorization 用户授权token
	* @apiHeaderExample {json} Header-示例:
	* "Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org"
	* @apiParam (输入参数：) {string}     		member_menu_ids 主键id 注意后面跟了s 多数据删除

	* @apiParam (失败返回参数：) {object}     	array 返回结果集
	* @apiParam (失败返回参数：) {string}     	array.status 返回错误码 201
	* @apiParam (失败返回参数：) {string}     	array.msg 返回错误消息
	* @apiParam (成功返回参数：) {string}     	array 返回结果集
	* @apiParam (成功返回参数：) {string}     	array.status 返回错误码 200
	* @apiParam (成功返回参数：) {string}     	array.msg 返回成功消息
	* @apiSuccessExample {json} 01 成功示例
	* {"status":"200","msg":"操作成功"}
	* @apiErrorExample {json} 02 失败示例
	* {"status":"201","msg":"操作失败"}
	*/
	function soft_delete(){
		$idx =  $this->request->post('member_menu_ids', '', 'serach_in');
		if(empty($idx)){
			throw new ValidateException('参数错误');
		}
		$data['member_menu_id'] = explode(',',$idx);
		try{
			MemberMenuModel::destroy($data);
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return $this->ajaxReturn($this->successCode,'操作成功');
	}



}

