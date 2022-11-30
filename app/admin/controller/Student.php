<?php 
/*
 module:		学生管理
 create_time:	2022-11-29 17:35:42
 author:		
 contact:		
*/

namespace app\admin\controller;

use app\admin\service\StudentService;
use app\admin\model\Student as StudentModel;
use think\facade\Db;

class Student extends Admin {


	/*首页数据列表*/
	function index(){
		if (!$this->request->isAjax()){
			return view('index');
		}else{
			$limit  = $this->request->post('limit', 20, 'intval');
			$offset = $this->request->post('offset', 0, 'intval');
			$page   = floor($offset / $limit) +1 ;

			$where = [];
			$where['student_name'] = $this->request->param('student_name', '', 'serach_in');
			$where['class_name'] = $this->request->param('class_name', '', 'serach_in');
			$where['class_id'] = $this->request->param('class_id', '', 'serach_in');
			$where['family_mobile'] = $this->request->param('family_mobile', '', 'serach_in');
			$where['id_card'] = $this->request->param('id_card', '', 'serach_in');
			$where['role'] = $this->request->param('role', '', 'serach_in');

			$create_time_start = $this->request->param('create_time_start', '', 'serach_in');
			$create_time_end = $this->request->param('create_time_end', '', 'serach_in');

			$where['create_time'] = ['between',[strtotime($create_time_start),strtotime($create_time_end)]];

			$order  = $this->request->post('order', '', 'serach_in');	//排序字段 bootstrap-table 传入
			$sort  = $this->request->post('sort', '', 'serach_in');		//排序方式 desc 或 asc

			$field = 'student_id,student_name,class_name,class_id,family_mobile,id_card,password,role,create_time';
			$orderby = ($sort && $order) ? $sort.' '.$order : 'student_id desc';

			$res = StudentService::indexList(formatWhere($where),$field,$orderby,$limit,$page);
			return json($res);
		}
	}

	/*添加*/
	function add(){
		if (!$this->request->isPost()){
			return view('add');
		}else{
			$postField = 'student_name,class_name,class_id,family_mobile,id_card,password,role,create_time';
			$data = $this->request->only(explode(',',$postField),'post',null);
			$res = StudentService::add($data);
			return json(['status'=>'00','msg'=>'添加成功']);
		}
	}

	/*修改*/
	function update(){
		if (!$this->request->isPost()){
			$student_id = $this->request->get('student_id','','serach_in');
			if(!$student_id) $this->error('参数错误');
			$this->view->assign('info',checkData(StudentModel::find($student_id)));
			return view('update');
		}else{
			$postField = 'student_id,student_name,class_name,class_id,family_mobile,id_card,password,role,create_time';
			$data = $this->request->only(explode(',',$postField),'post',null);
			$res = StudentService::update($data);
			return json(['status'=>'00','msg'=>'修改成功']);
		}
	}

	/*删除*/
	function delete(){
		$idx =  $this->request->post('student_id', '', 'serach_in');
		if(!$idx) $this->error('参数错误');
		try{
			StudentModel::destroy(['student_id'=>explode(',',$idx)],true);
		}catch(\Exception $e){
			abort(config('my.error_log_code'),$e->getMessage());
		}
		return json(['status'=>'00','msg'=>'操作成功']);
	}

	/*查看详情*/
	function view(){
		$student_id = $this->request->get('student_id','','serach_in');
		if(!$student_id) $this->error('参数错误');
		$this->view->assign('info',StudentModel::find($student_id));
		return view('view');
	}

	/*导出*/
	function dumpData(){
		$where = [];
		$where['student_name'] = $this->request->param('student_name', '', 'serach_in');
		$where['class_name'] = $this->request->param('class_name', '', 'serach_in');
		$where['family_mobile'] = $this->request->param('family_mobile', '', 'serach_in');
		$where['id_card'] = $this->request->param('id_card', '', 'serach_in');
		$where['role'] = $this->request->param('role', '', 'serach_in');

		$create_time_start = $this->request->param('create_time_start', '', 'serach_in');
		$create_time_end = $this->request->param('create_time_end', '', 'serach_in');

		$where['create_time'] = ['between',[strtotime($create_time_start),strtotime($create_time_end)]];
		$where['student_id'] = ['in',$this->request->param('student_id', '', 'serach_in')];

		try {
			//此处读取前端传过来的 表格勾选的显示字段
			$fieldInfo = [];
			for($j=0; $j<100;$j++){
				$fieldInfo[] = $this->request->param($j);
			}
			$list = StudentModel::where(formatWhere($where))->order('student_id desc')->select();
			if(empty($list)) throw new Exception('没有数据');
			StudentService::dumpData(htmlOutList($list),filterEmptyArray(array_unique($fieldInfo)));
		} catch (\Exception $e) {
			$this->error($e->getMessage());
		}
	}

	/*导入*/
	function import(){
		if ($this->request->isPost()) {
			try{
				$key = 'Student';
				$result = \base\CommonService::importData($key);
				if (count($result) > 0) {
					cache($key,$result,3600);
					return redirect('startImport');
				} else{
					$this->error('内容格式有误！');
				}
			}catch(\Exception $e){
				$this->error($e->getMessage());
			}
		}else {
			return view('base/importData');
		}
	}

	//开始导入
	function startImport(){
		if(!$this->request->isPost()) {
			return view('base/startImport');
		}else{
			$p = $this->request->post('p', '', 'intval'); 
			$data = cache('Student');
			$export_per_num = config('my.export_per_num') ? config('my.export_per_num') : 50;
			$num = ceil((count($data)-1)/$export_per_num);
			if($data){
				$start = $p == 1 ? 2 : ($p-1) * $export_per_num + 1;
				if($data[$start]){
					$dt['percent'] = ceil(($p)/$num*100);
					try{
						for($i=1; $i<=$export_per_num; $i++ ){
						//根据中文名称来读取字段名称
							if($data[$i + ($p-1)*$export_per_num]){
								foreach($data[1] as $key=>$val){
									$fieldInfo = db('field')->where(['name'=>$val,'menu_id'=>736])->find();
									if($val && $fieldInfo){
										$d[$fieldInfo['field']] = $data[$i + ($p-1)*$export_per_num][$key];
										if($fieldInfo['type'] == 17){
											unset($d[$fieldInfo['field']]);
										}
										if(in_array($fieldInfo['type'],[7,12])){	//时间字段
											if(strlen($data[$i + ($p-1)*$export_per_num][$key]) == 5){
												$d[$fieldInfo['field']] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($data[$i + ($p-1)*$export_per_num][$key]);
											}else{
												$d[$fieldInfo['field']] = strtotime($data[$i + ($p-1)*$export_per_num][$key]);
											}
										}
										if($fieldInfo['type'] == 5){	//密码字段
											$d[$fieldInfo['field']] = md5($data[$i + ($p-1)*$export_per_num][$key].config('my.password_secrect'));
										}
										if($fieldInfo['type'] == 17){	//三级联动字段
											$arrTitle = explode('|',$fieldInfo['field']);
											$arrValue = explode('-',$data[$i + ($p-1)*$export_per_num][$key]);
											if($arrTitle && $arrValue){
												foreach($arrTitle as $k=>$v){
													$d[$v] = $arrValue[$k];
												}
											}
										}
										if(in_array($fieldInfo['type'],[2,3,23,29]) && empty($fieldInfo['sql'])){	//下拉，单选，开关按钮
											$d[$fieldInfo['field']] = getFieldName($data[$i + ($p-1)*$export_per_num][$key],$fieldInfo['config']);
										}
									}
								}
								$d['create_time'] = time();
								if(($i + ($p-1)*$export_per_num) > 1){
									StudentModel::create($d);
								}
							}
						}
					}catch(\Exception $e){
						abort(config('my.error_log_code'),$e->getMessage());
					}
					return json(['error'=>'00','data'=>$dt]);
				}else{
					cache('Student',null);
					return json(['error'=>'10']);
				}
			}else{
				$this->error('当前没有数据');
			}
		}
	}
	/*修改密码*/
	function change_password(){
		if (!$this->request->isPost()){
			$info['student_id'] = $this->request->get('student_id','','serach_in');
			return view('change_password',['info'=>$info]);
		}else{
			$postField = 'student_id,password';
			$data = $this->request->only(explode(',',$postField),'post',null);
			if(empty($data['student_id'])) $this->error('参数错误');
			StudentService::change_password($data);
			return json(['status'=>'00','msg'=>'操作成功']);
		}
	}



}

