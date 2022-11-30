<?php 
/*
 module:		角色管理
 create_time:	2022-11-29 13:21:14
 author:		
 contact:		
*/

namespace app\admin\service;
use app\admin\model\MemberRole;
use think\exception\ValidateException;
use base\CommonService;

class MemberRoleService extends CommonService {


	/*
 	* @Description  列表数据
 	*/
	public static function indexList($where,$field,$order,$limit,$page){
		try{
			$res = MemberRole::where($where)->field($field)->order($order)->paginate(['list_rows'=>$limit,'page'=>$page])->toArray();
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return ['rows'=>$res['data'],'total'=>$res['total']];
	}


	/*
 	* @Description  添加
 	*/
	public static function add($data){
		try{
			validate(\app\admin\validate\MemberRole::class)->scene('add')->check($data);
			$data['create_time'] = time();
			$data['role_menu'] = implode(',',$data['role_menu']);
			$res = MemberRole::create($data);
		}catch(ValidateException $e){
			throw new ValidateException ($e->getError());
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		if(!$res){
			throw new ValidateException ('操作失败');
		}
		return $res->member_role_id;
	}


	/*
 	* @Description  修改
 	*/
	public static function update($data){
		try{
			validate(\app\admin\validate\MemberRole::class)->scene('update')->check($data);
			$data['create_time'] = strtotime($data['create_time']);
			$data['role_menu'] = implode(',',$data['role_menu']);
			$res = MemberRole::update($data);
		}catch(ValidateException $e){
			throw new ValidateException ($e->getError());
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		if(!$res){
			throw new ValidateException ('操作失败');
		}
		return $res;
	}




}

