<?php 
/*
 module:		角色管理验证器
 create_time:	2022-11-29 13:21:14
 author:		
 contact:		
*/

namespace app\admin\validate;
use think\validate;

class MemberRole extends validate {


	protected $rule = [
		'role_name'=>['require'],
		'status'=>['require'],
		'type'=>['require'],
	];

	protected $message = [
		'role_name.require'=>'角色名不能为空',
		'status.require'=>'状态不能为空',
		'type.require'=>'类型不能为空',
	];

	protected $scene  = [
		'add'=>['role_name','status','type'],
		'update'=>['role_name','status','type'],
	];



}

