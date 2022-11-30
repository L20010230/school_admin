<?php 
/*
 module:		账号管理
 create_time:	2022-11-29 14:57:04
 author:		
 contact:		
*/

namespace app\api\service;
use app\api\model\Member;
use think\facade\Log;
use think\exception\ValidateException;
use base\CommonService;

class MemberService extends CommonService {


	/*
 	* @Description  列表数据
 	*/
	public static function indexList($where,$field,$orderby,$limit,$page){
		try{
			$res = Member::where($where)->field($field)->order($orderby)->paginate(['list_rows'=>$limit,'page'=>$page])->toArray();
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
			validate(\app\api\validate\Member::class)->scene('add')->check($data);
			$data['password'] = md5($data['password'].config('my.password_secrect'));
			$res = Member::create($data);
		}catch(ValidateException $e){
			throw new ValidateException ($e->getError());
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return $res->member_id;
	}


	/*
 	* @Description  修改
 	*/
	public static function update($where,$data){
		try{
			validate(\app\api\validate\Member::class)->scene('update')->check($data);
			$res = Member::where($where)->update($data);
		}catch(ValidateException $e){
			throw new ValidateException ($e->getError());
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return $res;
	}


	/*
 	* @Description  账号密码登录
 	*/
	public static function member_login($data,$returnField){
		$where['user_name'] = $data['user_name'];
		$where['password'] = md5($data['password'].config('my.password_secrect'));
		try{
			$res = Member::field($returnField)->where($where)->find();
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		if(!$res){
			throw new ValidateException('请检查用户名或者密码');
		}
		return checkData($res,false);
	}




}

