<?php 
/*
 module:		账号管理验证器
 create_time:	2022-11-29 14:57:04
 author:		
 contact:		
*/

namespace app\api\validate;
use think\validate;

class Member extends validate {


	protected $rule = [
		'name'=>['require'],
		'user_name'=>['require'],
		'password'=>['require'],
		'mobile'=>['require','regex'=>'/^1[3456789]\d{9}$/'],
	];

	protected $message = [
		'name.require'=>'姓名不能为空',
		'user_name.require'=>'账号不能为空',
		'password.require'=>'密码不能为空',
		'mobile.require'=>'手机号不能为空',
		'mobile.regex'=>'手机号格式错误',
	];

	protected $scene  = [
		'add'=>['name','user_name','password','mobile'],
		'update'=>['name','user_name','password','mobile'],
	];



}

