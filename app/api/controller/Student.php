<?php 
/*
 module:		学生管理
 create_time:	2022-11-29 17:40:18
 author:		
 contact:		
*/

namespace app\api\controller;

use app\api\service\StudentService;
use app\api\model\Student as StudentModel;
use think\exception\ValidateException;
use think\facade\Db;
use think\facade\Log;

class Student extends Common {


	/**
	* @api {get} /Student/index 01、学生列表
	* @apiGroup Student
	* @apiVersion 1.0.0
	* @apiDescription  学生列表

	* @apiHeader {String} Authorization 用户授权token
	* @apiHeaderExample {json} Header-示例:
	* "Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org"

	* @apiParam (输入参数：) {int}     		[limit] 每页数据条数（默认20）
	* @apiParam (输入参数：) {int}     		[page] 当前页码
	* @apiParam (输入参数：) {string}		[student_name] 姓名 
	* @apiParam (输入参数：) {string}		[class_name] 班级名称 
	* @apiParam (输入参数：) {string}		[family_mobile] 家长手机号 
	* @apiParam (输入参数：) {string}		[id_card] 身份证号 
	* @apiParam (输入参数：) {int}			[role] 角色 
	* @apiParam (输入参数：) {string}		[create_time_start] 创建时间开始
	* @apiParam (输入参数：) {string}		[create_time_end] 创建时间结束

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
		$where['student_name'] = $this->request->get('student_name', '', 'serach_in');
		$where['class_name'] = $this->request->get('class_name', '', 'serach_in');
		$where['class_id'] = $this->request->get('class_id', '', 'serach_in');
		$where['family_mobile'] = $this->request->get('family_mobile', '', 'serach_in');
		$where['id_card'] = $this->request->get('id_card', '', 'serach_in');
		$where['role'] = $this->request->get('role', '', 'serach_in');

		$create_time_start = $this->request->get('create_time_start', '', 'serach_in');
		$create_time_end = $this->request->get('create_time_end', '', 'serach_in');

		$where['create_time'] = ['between',[strtotime($create_time_start),strtotime($create_time_end)]];

		$field = '*';
		$orderby = 'student_id desc';

		$res = StudentService::indexList(formatWhere($where),$field,$orderby,$limit,$page);
		return $this->ajaxReturn($this->successCode,'返回成功',htmlOutList($res));
	}

	/**
	* @api {post} /Student/add 02、添加或导入学生
	* @apiGroup Student
	* @apiVersion 1.0.0
	* @apiDescription  添加

	* @apiHeader {String} Authorization 用户授权token
	* @apiHeaderExample {json} Header-示例:
	* "Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org"
	* @apiParam (输入参数：) {string}			student_name 姓名 (必填) 
	* @apiParam (输入参数：) {string}			class_name 班级名称 
	* @apiParam (输入参数：) {int}				class_id 班级id 
	* @apiParam (输入参数：) {string}			family_mobile 家长手机号 (必填) 
	* @apiParam (输入参数：) {string}			id_card 身份证号 

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
		$postField = 'student_name,class_name,class_id,family_mobile,id_card';
		$data = $this->request->only(explode(',',$postField),'post',null);
		$res = StudentService::add($data);
		return $this->ajaxReturn($this->successCode,'操作成功',$res);
	}

	/**
	* @api {post} /Student/update 03、修改学生
	* @apiGroup Student
	* @apiVersion 1.0.0
	* @apiDescription  修改
	
	* @apiParam (输入参数：) {string}     		student_id 主键ID (必填)

	* @apiHeader {String} Authorization 用户授权token
	* @apiHeaderExample {json} Header-示例:
	* "Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org"
	* @apiParam (输入参数：) {string}			student_name 姓名 (必填) 
	* @apiParam (输入参数：) {string}			class_name 班级名称 
	* @apiParam (输入参数：) {int}				class_id 班级id 
	* @apiParam (输入参数：) {string}			family_mobile 家长手机号 (必填) 
	* @apiParam (输入参数：) {string}			id_card 身份证号 

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
		$postField = 'student_id,student_name,class_name,class_id,family_mobile,id_card';
		$data = $this->request->only(explode(',',$postField),'post',null);
		if(empty($data['student_id'])){
			throw new ValidateException('参数错误');
		}
		$where['student_id'] = $data['student_id'];
		$res = StudentService::update($where,$data);
		return $this->ajaxReturn($this->successCode,'操作成功');
	}

	/**
	* @api {get} /Student/view 04、查看学生详情
	* @apiGroup Student
	* @apiVersion 1.0.0
	* @apiDescription  查看详情
	
	* @apiParam (输入参数：) {string}     		student_id 主键ID

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
		$data['student_id'] = $this->request->get('student_id','','serach_in');
		$field='student_id,student_name,class_name,class_id,family_mobile,id_card,create_time';
		$res  = checkData(StudentModel::field($field)->where($data)->find());
		return $this->ajaxReturn($this->successCode,'返回成功',$res);
	}

	/**
	* @api {post} /Student/change_password 06、修改密码
	* @apiGroup Student
	* @apiVersion 1.0.0
	* @apiDescription  修改密码
	
	* @apiParam (输入参数：) {string}     		student_id 主键ID
	* @apiParam (输入参数：) {string}     		password 新密码(必填)
	* @apiParam (输入参数：) {string}     		repassword 重复密码(必填)

	* @apiHeader {String} Authorization 用户授权token
	* @apiHeaderExample {json} Header-示例:
	* "Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org"

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
	function change_password(){
		$postField = 'student_id,password,repassword';
		$data = $this->request->only(explode(',',$postField),'post',null);
		if(empty($data['student_id'])){
			throw new ValidateException('参数错误');
		}
		if(empty($data['password'])){ 
			throw new ValidateException('密码不能为空');
		}
		if($data['password'] <> $data['repassword']){ 
			throw new ValidateException('两次密码输入不一致');
		}
		$where['student_id'] = $data['student_id'];
		$res = StudentService::change_password($where,$data);
		return $this->ajaxReturn($this->successCode,'操作成功');
	}



}

