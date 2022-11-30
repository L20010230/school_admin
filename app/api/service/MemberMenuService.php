<?php 
/*
 module:		菜单配置
 create_time:	2022-11-30 10:30:41
 author:		
 contact:		
*/

namespace app\api\service;
use app\api\model\MemberMenu;
use think\facade\Log;
use think\exception\ValidateException;
use base\CommonService;

class MemberMenuService extends CommonService {


	/*
 	* @Description  列表数据
 	*/
	public static function indexList($where,$field,$orderby,$limit,$page){
		try{
			$res = MemberMenu::where($where)->field($field)->order($orderby)->paginate(['list_rows'=>$limit,'page'=>$page])->toArray();
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
			validate(\app\api\validate\MemberMenu::class)->scene('add')->check($data);
			$data['broadside_status'] = !is_null($data['broadside_status']) ? $data['broadside_status'] : '1';
			$data['create_time'] = time();
			$res = MemberMenu::create($data);
		}catch(ValidateException $e){
			throw new ValidateException ($e->getError());
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return $res->member_menu_id;
	}


	/*
 	* @Description  修改
 	*/
	public static function update($where,$data){
		try{
			validate(\app\api\validate\MemberMenu::class)->scene('update')->check($data);
			$res = MemberMenu::where($where)->update($data);
		}catch(ValidateException $e){
			throw new ValidateException ($e->getError());
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return $res;
	}




}

