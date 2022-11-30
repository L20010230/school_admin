<?php 
/*
 module:		菜单配置
 create_time:	2022-11-29 13:12:17
 author:		
 contact:		
*/

namespace app\admin\service;
use app\admin\model\MemberMenu;
use think\exception\ValidateException;
use base\CommonService;

class MemberMenuService extends CommonService {


	/*
 	* @Description  列表数据
 	*/
	public static function indexList($where,$field,$order,$limit,$page){
		try{
			$res = MemberMenu::where($where)->field($field)->order($order)->paginate(['list_rows'=>$limit,'page'=>$page])->toArray();
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
			validate(\app\admin\validate\MemberMenu::class)->scene('add')->check($data);
			$data['create_time'] = time();
			$res = MemberMenu::create($data);
		}catch(ValidateException $e){
			throw new ValidateException ($e->getError());
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		if(!$res){
			throw new ValidateException ('操作失败');
		}
		return $res->member_menu_id;
	}


	/*
 	* @Description  修改
 	*/
	public static function update($data){
		try{
			validate(\app\admin\validate\MemberMenu::class)->scene('update')->check($data);
			$data['create_time'] = strtotime($data['create_time']);
			$res = MemberMenu::update($data);
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

