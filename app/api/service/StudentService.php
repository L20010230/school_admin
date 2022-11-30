<?php 
/*
 module:		学生管理
 create_time:	2022-11-29 17:40:18
 author:		
 contact:		
*/

namespace app\api\service;
use app\api\model\Student;
use think\facade\Log;
use think\exception\ValidateException;
use base\CommonService;

class StudentService extends CommonService {


	/*
 	* @Description  列表数据
 	*/
	public static function indexList($where,$field,$orderby,$limit,$page){
		try{
			$res = Student::where($where)->field($field)->order($orderby)->paginate(['list_rows'=>$limit,'page'=>$page])->toArray();
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
			validate(\app\api\validate\Student::class)->scene('add')->check($data);
			$res = Student::create($data);
		}catch(ValidateException $e){
			throw new ValidateException ($e->getError());
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return $res->student_id;
	}


	/*
 	* @Description  修改
 	*/
	public static function update($where,$data){
		try{
			validate(\app\api\validate\Student::class)->scene('update')->check($data);
			$res = Student::where($where)->update($data);
		}catch(ValidateException $e){
			throw new ValidateException ($e->getError());
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return $res;
	}


	/*
 	* @Description  修改密码
 	*/
	public static function change_password($where,$data){
		try{
			validate(\app\api\validate\Student::class)->scene('change_password')->check($data);
			$res = Student::where($where)->update(['password'=>md5($data['password'].config('my.password_secrect'))]);
		}catch(ValidateException $e){
			throw new ValidateException ($e->getError());
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return $res;
	}




}

