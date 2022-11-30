<?php 
/*
 module:		菜单配置验证器
 create_time:	2022-11-30 10:30:41
 author:		
 contact:		
*/

namespace app\api\validate;
use think\validate;

class MemberMenu extends validate {


	protected $rule = [
		'menu_name'=>['require'],
		'url'=>['require'],
		'route_url'=>['require'],
		'menu_order'=>['require'],
		'broadside_status'=>['require'],
	];

	protected $message = [
		'menu_name.require'=>'菜单名称不能为空',
		'url.require'=>'菜单URL不能为空',
		'route_url.require'=>'路由name不能为空',
		'menu_order.require'=>'显示顺序不能为空',
		'broadside_status.require'=>'侧边显示不能为空',
	];

	protected $scene  = [
		'add'=>['menu_name','url','route_url','menu_order','broadside_status'],
		'update'=>['menu_name','url','route_url','menu_order','broadside_status'],
	];



}

