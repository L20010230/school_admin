<?php 
/*
 module:		学生管理验证器
 create_time:	2022-11-29 17:35:42
 author:		
 contact:		
*/

namespace app\admin\validate;
use think\validate;

class Student extends validate {


	protected $rule = [
		'student_name'=>['require'],
		'family_mobile'=>['require','regex'=>'/^1[3456789]\d{9}$/'],
		'id_card'=>['regex'=>'/^[1-9]\d{5}(18|19|20|(3\d))\d{2}((0[1-9])|(1[0-2]))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx]$/'],
		'password'=>['require'],
	];

	protected $message = [
		'student_name.require'=>'姓名不能为空',
		'family_mobile.require'=>'家长手机号不能为空',
		'family_mobile.regex'=>'家长手机号格式错误',
		'id_card.regex'=>'身份证号格式错误',
		'password.require'=>'密码不能为空',
	];

	protected $scene  = [
		'add'=>['student_name','family_mobile','id_card','password'],
		'update'=>['student_name','family_mobile','id_card','password'],
		'change_password'=>['password'],
	];



}

