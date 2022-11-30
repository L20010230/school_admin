<?php

//接口路由文件

use think\facade\Route;

Route::rule('Member/index', 'Member/index')->middleware(['JwtAuth']);	//账号管理账号列表;
Route::rule('Member/add', 'Member/add')->middleware(['JwtAuth']);	//账号管理添加账号;
Route::rule('Member/update', 'Member/update')->middleware(['JwtAuth']);	//账号管理修改账号;
Route::rule('Member/view', 'Member/view')->middleware(['JwtAuth']);	//账号管理查看账号详情;
Route::rule('Member/soft_delete', 'Member/soft_delete')->middleware(['JwtAuth']);	//账号管理删除账号;
Route::rule('MemberRole/index', 'MemberRole/index')->middleware(['JwtAuth']);	//角色管理角色列表;
Route::rule('MemberRole/add', 'MemberRole/add')->middleware(['JwtAuth']);	//角色管理添加角色;
Route::rule('MemberRole/update', 'MemberRole/update')->middleware(['JwtAuth']);	//角色管理修改角色;
Route::rule('MemberRole/soft_delete', 'MemberRole/soft_delete')->middleware(['JwtAuth']);	//角色管理删除角色;
Route::rule('MemberRole/view', 'MemberRole/view')->middleware(['JwtAuth']);	//角色管理查看角色详情;
Route::rule('MemberMenu/index', 'MemberMenu/index')->middleware(['JwtAuth']);	//菜单配置菜单列表;
Route::rule('MemberMenu/add', 'MemberMenu/add')->middleware(['JwtAuth']);	//菜单配置添加菜单;
Route::rule('MemberMenu/update', 'MemberMenu/update')->middleware(['JwtAuth']);	//菜单配置修改菜单;
Route::rule('MemberMenu/soft_delete', 'MemberMenu/soft_delete')->middleware(['JwtAuth']);	//菜单配置删除菜单;
Route::rule('MemberMenu/view', 'MemberMenu/view')->middleware(['JwtAuth']);	//菜单配置查看菜单详情;
Route::rule('MemberRole/set_role_menu', 'MemberRole/set_role_menu')->middleware(['JwtAuth']);	//角色管理设置角色菜单;
Route::rule('Member/get_member_menu', 'Member/get_member_menu')->middleware(['JwtAuth']);	//账号管理获取路由信息与侧边栏;
Route::rule('Student/index', 'Student/index')->middleware(['JwtAuth']);	//学生管理学生列表;
Route::rule('Student/add', 'Student/add')->middleware(['JwtAuth']);	//学生管理添加或导入学生;
Route::rule('Student/update', 'Student/update')->middleware(['JwtAuth']);	//学生管理修改学生;
Route::rule('Student/view', 'Student/view')->middleware(['JwtAuth']);	//学生管理查看学生详情;
Route::rule('Student/dumpData', 'Student/dumpData')->middleware(['JwtAuth']);	//学生管理导出学生数据;
Route::rule('Student/change_password', 'Student/change_password')->middleware(['JwtAuth']);	//学生管理修改密码;
Route::rule('Base/Upload', 'Base/Upload')->middleware(['JwtAuth']);	//图片上传;


