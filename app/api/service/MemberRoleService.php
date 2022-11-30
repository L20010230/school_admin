<?php 
/*
 module:		角色管理
 create_time:	2022-11-29 13:41:15
 author:		
 contact:		
*/

namespace app\api\service;
use app\api\model\MemberRole;
use think\facade\Log;
use think\exception\ValidateException;
use base\CommonService;

class MemberRoleService extends CommonService {


	/*
 	* @Description  列表数据
 	*/
	public static function indexList($where,$field,$orderby,$limit,$page){
		try{
			$res = MemberRole::where($where)->field($field)->order($orderby)->paginate(['list_rows'=>$limit,'page'=>$page])->toArray();
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return ['list'=>$res['data'],'count'=>$res['total']];
	}


	/*
 	* @Description  添加
 	*/
	public static function add($data){
		try{
			validate(\app\api\validate\MemberRole::class)->scene('add')->check($data);
			$data['status'] = !is_null($data['status']) ? $data['status'] : '2';
			$res = MemberRole::create($data);
		}catch(ValidateException $e){
			throw new ValidateException ($e->getError());
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return $res->member_role_id;
	}


	/*
 	* @Description  修改
 	*/
	public static function update($where,$data){
		try{
			validate(\app\api\validate\MemberRole::class)->scene('update')->check($data);
			$res = MemberRole::where($where)->update($data);
		}catch(ValidateException $e){
			throw new ValidateException ($e->getError());
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return $res;
	}


	/*
 	* @Description  编辑数据
 	*/
	public static function set_role_menu($where,$data){
		try{
			$res = MemberRole::where($where)->update($data);
		}catch(ValidateException $e){
			throw new ValidateException ($e->getError());
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return $res;
	}




}

