<?php 
/*
 module:		账号管理
 create_time:	2022-11-29 11:10:16
 author:		
 contact:		
*/

namespace app\admin\service;
use app\admin\model\Member;
use think\exception\ValidateException;
use base\CommonService;

class MemberService extends CommonService {


	/*
 	* @Description  列表数据
 	*/
	public static function indexList($where,$field,$order,$limit,$page){
		try{
			$res = Member::where($where)->field($field)->order($order)->paginate(['list_rows'=>$limit,'page'=>$page])->toArray();
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
			validate(\app\admin\validate\Member::class)->scene('add')->check($data);
			$data['password'] = md5($data['password'].config('my.password_secrect'));
			$data['create_time'] = time();
			$res = Member::create($data);
		}catch(ValidateException $e){
			throw new ValidateException ($e->getError());
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		if(!$res){
			throw new ValidateException ('操作失败');
		}
		return $res->member_id;
	}


	/*
 	* @Description  修改
 	*/
	public static function update($data){
		try{
			validate(\app\admin\validate\Member::class)->scene('update')->check($data);
			$data['create_time'] = strtotime($data['create_time']);
			$res = Member::update($data);
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


	/*
 	* @Description  修改密码
 	*/
	public static function change_password($data){
		try{
			validate(\app\admin\validate\Member::class)->scene('change_password')->check($data);
			$data['password'] = md5($data['password'].config('my.password_secrect'));
			$res = Member::update($data);
		}catch(ValidateException $e){
			throw new ValidateException ($e->getError());
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return $res;
	}




}

