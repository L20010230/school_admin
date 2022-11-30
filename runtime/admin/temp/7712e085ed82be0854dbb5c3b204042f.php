<?php /*a:2:{s:93:"/www/wwwroot/senior.test.jiayuanxueyuan.cn/app/admin/controller/Sys/view/action/api_info.html";i:1588207770;s:80:"/www/wwwroot/senior.test.jiayuanxueyuan.cn/app/admin/view/common/_container.html";i:1602393978;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit"/><!-- 让360浏览器默认选择webkit内核 -->

    <!-- 全局css -->
    <!-- 全局css -->
    <link href="/static/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="/static/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
     <link href="/static/css/style.css?v=1.0.0" rel="stylesheet">
    <link rel="stylesheet" href="/static/js/plugins/layui/css/layui.css?ver=170803"  media="all">
	<link href="/static/css/plugins/webuploader/webuploader.css" rel="stylesheet">
    <script src="/static/js/jquery.min.js?v=2.1.4"></script>
    <script src="/static/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/static/js/plugins/bootstrap-table/bootstrap-table.min.js"></script>
	<script src="/static/js/plugins/validate/bootstrapValidator.min.js"></script>
    <script src="/static/js/plugins/validate/zh_CN.js"></script>
    <script src="/static/js/plugins/bootstrap-table/bootstrap-table-mobile.min.js"></script>
    <script src="/static/js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>
    <script src="/static/js/plugins/layer/layer.min.js"></script>
    <script src="/static/js/plugins/layer/laydate/laydate.js"></script>
    <script src="/static/js/common/ajax-object.js?v=<?php echo rand(1000,9999)?>"></script>
    <script src="/static/js/common/bootstrap-table-object.js"></script>
    <script src="/static/js/common/Feng.js"></script>
	<script src="/static/js/plugins/webuploader/webuploader.min.js"></script>
	<script type="text/javascript" src="/static/js/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="/static/js/ueditor/ueditor.all.min.js"> </script>
	<script type="text/javascript" src="/static/js/xheditor/xheditor-1.2.2.min.js"></script>
	<script type="text/javascript" src="/static/js/xheditor/xheditor_lang/zh-cn.js"></script>
	 <script type="text/javascript">
		<?php
			$domains = config('app.domain_bind');
			$app = app('http')->getName();
			if(in_array($app,$domains)){			
				$ctxPathUrl = request()->domain();
			}else{
				$ctxPathUrl = request()->domain().'/'.getKeyByVal(config('app.app_map'),$app);
			}
		?>
        Feng.addCtx("<?php echo $ctxPathUrl;?>");
        Feng.sessionTimeoutRegistry();
    </script>
</head>

<body>
<div class="wrapper wrapper-content animated fadeInRight">
	
<div class="ibox float-e-margins">
<input type="hidden" name="id" id="id" value="<?php echo $info['id']; ?>">
<?php if($info['id'] == ''): ?>
<input type="hidden" name="menu_id" id="menu_id" value="<?php echo $menu_id; ?>">
<?php endif; ?>
	<div class="ibox-content">
		<div class="form-horizontal" id="CodeInfoForm">
			<div class="row" style="margin-top:-20px;">
				<div class="layui-tab layui-tab-brief" lay-filter="test">
					<ul class="layui-tab-title">
						<li class="layui-this">基本信息</li>
						<li>拓展信息</li>
						<li>多表操作配置</li>
					</ul>
					
					<div class="layui-tab-content" style="margin-top:10px;">
						<div class="layui-tab-item layui-show">
							<div class="col-sm-10">
							<!-- form start -->
								<div class="form-group">
									<label class="col-sm-2 control-label">操作名：</label>
									<div class="col-sm-9">
										<input type="text" id="name" value="<?php echo $info['name']; ?>" name="name" class="form-control" placeholder="请输入操作名">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">方法名称：</label>
									<div class="col-sm-9">
										<input type="text" id="action_name" value="<?php echo $info['action_name']; ?>" name="action_name" class="form-control" placeholder="请输入方法名称">
									</div>
								</div>
								<div class="form-group layui-form">
									<label class="col-sm-2 control-label">方法类型：</label>
									<div class="col-sm-9">
										<select lay-ignore name="type" class="form-control" id="type">
											<option value="">请选择</option>
											<?php if(is_array($actionList) || $actionList instanceof \think\Collection || $actionList instanceof \think\Paginator): if( count($actionList)==0 ) : echo "" ;else: foreach($actionList as $key=>$vo): ?>
											<option value="<?php echo $key; ?>" <?php if($info['type'] == $key): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
											<?php endforeach; endif; else: echo "" ;endif; ?>
										</select>
									</div>
								</div>
								<div class="form-group layui-form">
									<label class="col-sm-2 control-label">操作字段：</label>
									<div class="col-sm-9">
										<?php $menu_id = isset($info['menu_id']) ? $info['menu_id'] : request()->param('menu_id');$_result=htmlOutList(db('field')->where("menu_id=$menu_id and is_post =1 ")->order('sortid asc')->select()->toArray(),false);if($_result)foreach($_result as $key=>$query):?>
										<input value="<?php echo $query['field']; ?>" name="fields" lay-filter="hope" class="checkbox" type="checkbox" <?php if(in_array($query['field'],explode(',',$info['fields']))): ?>checked<?php endif; ?> title="<?php echo $query['name']; ?>">
										<?php endforeach;else?><?php echo "";?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">请求方式：</label>
									<div class="col-sm-9">
										<select lay-ignore name="request_type" class="form-control" id="request_type">
											<option value="">请选择</option>
											<?php if(is_array($requestList) || $requestList instanceof \think\Collection || $requestList instanceof \think\Paginator): if( count($requestList)==0 ) : echo "" ;else: foreach($requestList as $key=>$vo): ?>
											<option value="<?php echo $vo; ?>" <?php if($info['request_type'] == $vo): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
											<?php endforeach; endif; else: echo "" ;endif; ?>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label">配置信息：</label>
									<div class="col-sm-9">
										<input type="text" id="remark" value="<?php echo $info['remark']; ?>" name="remark" class="form-control" placeholder="请输入默认值">
										<span class="help-block m-b-none"><a  target="_blank" style="color:#ff0000" onclick="CodeInfoDlg.config('bs_icon')">配置说明 </a></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">数据缓存时间：</label>
									<div class="col-sm-9">
										<?php if(!isset($info['cache_time']) && empty($info['id'])){ $info['cache_time'] = ''; }; ?>
										<input type="text" id="cache_time" value="<?php echo $info['cache_time']; ?>" name="cache_time" class="form-control" placeholder="请输入数据缓存时间">
										<span class="help-block m-b-none">数据缓存时间,单位s 后缀勿填写</span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">方法描述：</label>
									<div class="col-sm-9">
										<textarea id="block_name" name="block_name" class="form-control" placeholder="请输入方法"><?php echo $info['block_name']; ?></textarea>
									</div>
								</div>
								
							<!-- form end -->
							</div>
						</div>
						<div class="layui-tab-item">
							<div class="form-group layui-form">
								<label class="col-sm-2 control-label">控制器方法是否生成：</label>
								<div class="col-sm-9">
									<?php if(!isset($info['is_controller_create'])){ $info['is_controller_create'] = 1; }; ?>
									<input name="is_controller_create" value="1" type="radio" <?php if($info['is_controller_create'] == 1): ?>checked<?php endif; ?> title="是">
									<input name="is_controller_create" value="0" type="radio" <?php if($info['is_controller_create'] == 0): ?>checked<?php endif; ?> title="否">
								</div>
							</div>
							<div class="form-group layui-form">
								<label class="col-sm-2 control-label">服务层方法是否生成：</label>
								<div class="col-sm-9">
									<?php if(!isset($info['is_service_create'])){ $info['is_service_create'] = 1; }; ?>
									<input name="is_service_create" value="1" type="radio" <?php if($info['is_service_create'] == 1): ?>checked<?php endif; ?> title="是">
									<input name="is_service_create" value="0" type="radio" <?php if($info['is_service_create'] == 0): ?>checked<?php endif; ?> title="否">
								</div>
							</div>
							<div class="form-group layui-form">
								<label class="col-sm-2 control-label">接口生成日志：</label>
								<div class="col-sm-9">
									<?php if(!isset($info['log_status'])){ $info['log_status'] = 1; }; ?>
									<input name="log_status" value="1" type="radio" <?php if($info['log_status'] == 1): ?>checked<?php endif; ?> title="是">
									<input name="log_status" value="0" type="radio" <?php if($info['log_status'] == 0): ?>checked<?php endif; ?> title="否">
								</div>
							</div>
							<div class="form-group layui-form">
								<label class="col-sm-2 control-label">token认证：</label>
								<div class="col-sm-9">
									<?php if(!isset($info['api_auth'])){ $info['api_auth'] = 0; }; ?>
									<input name="api_auth" value="1" type="radio" <?php if($info['api_auth'] == 1): ?>checked<?php endif; ?> title="是">
									<input name="api_auth" value="0" type="radio" <?php if($info['api_auth'] == 0): ?>checked<?php endif; ?> title="否">
								</div>
							</div>
							<div class="form-group layui-form">
								<label class="col-sm-2 control-label">短信认证：</label>
								<div class="col-sm-9">
									<?php if(!isset($info['sms_auth'])){ $info['sms_auth'] = 0; }; ?>
									<input name="sms_auth" value="1" type="radio" <?php if($info['sms_auth'] == 1): ?>checked<?php endif; ?> title="是">
									<input name="sms_auth" value="0" type="radio" <?php if($info['sms_auth'] == 0): ?>checked<?php endif; ?> title="否">
								</div>
							</div>
							<div class="form-group layui-form">
								<label class="col-sm-2 control-label">图片验证码认证：</label>
								<div class="col-sm-9">
									<?php if(!isset($info['captcha_auth'])){ $info['captcha_auth'] = 0; }; ?>
									<input name="captcha_auth" value="1" type="radio" <?php if($info['captcha_auth'] == 1): ?>checked<?php endif; ?> title="是">
									<input name="captcha_auth" value="0" type="radio" <?php if($info['captcha_auth'] == 0): ?>checked<?php endif; ?> title="否">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">每页显示数据：</label>
								<div class="col-sm-9">					
									<input type="text" id="pagesize" name="pagesize" value="<?php echo $info['pagesize']; ?>" class="form-control" placeholder="每页显示多少条数据，默认20">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">默认排序：</label>
								<div class="col-sm-9">					
									<input type="text" id="default_orderby" name="default_orderby" value="<?php echo $info['default_orderby']; ?>"  class="form-control" placeholder="默认排序，如不填则按照主键倒序">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">配置树级列表：</label>
								<div class="col-sm-9">					
									<input type="text" id="tree_config" name="tree_config" value="<?php echo $info['tree_config']; ?>" class="form-control" placeholder="当前父级ID,显示字段 例如 pid,title">
									<span class="help-block m-b-none">生成树级列表 格式父ID,显示字段名称 例如pid,title</span>
								</div>
							</div>
							
							
						</div>
						
						<div class="layui-tab-item">
							<div class="form-group">
								<label class="col-sm-2 control-label">关联表：</label>
								<div class="col-sm-9">
									<?php if(!isset($info['relate_table'])){ $info['relate_table'] = ''; }; ?>
										<select lay-ignore name="relate_table" class="form-control chosen" data-placeholder='请选择所属分类'  id="relate_table">
										<option value="">请选择关联表</option>
											<?php if(is_array($tableList) || $tableList instanceof \think\Collection || $tableList instanceof \think\Paginator): $i = 0; $__LIST__ = $tableList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
												<option value="<?php echo $vo; ?>" <?php if($info['relate_table'] == $vo): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
											<?php endforeach; endif; else: echo "" ;endif; ?>
										</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">关联字段：</label>
								<div class="col-sm-9">
									<input type="text" id="relate_field" value="<?php echo $info['relate_field']; ?>" name="relate_field" class="form-control" placeholder="请输入关联表 如果不是关联查询请勿填写">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">查询字段字段：</label>
								<div class="col-sm-9">
									<input type="text" id="list_field" value="<?php echo $info['list_field']; ?>" name="list_field" class="form-control" placeholder="请输入关联表需要查询的字段">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">sql数据源：</label>
								<div class="col-sm-9">
									<textarea id="sql_query" name="sql_query" class="form-control" placeholder="sql查询语句 前面的关联查询取消"><?php echo $info['sql_query']; ?></textarea>
								</div>
							</div>
						</div>
						
					</div>
					
				</div>
			</div>
			<div class="row btn-group-m-t">
				<div class="col-sm-10 col-sm-offset-1">
					<button type="button" class="btn btn-primary" onclick="<?php if($info['id'] != ''): ?>CodeInfoDlg.update()<?php else: ?>CodeInfoDlg.add()<?php endif; ?>" id="ensure">
						<i class="fa fa-check"></i>&nbsp;确认提交
					</button>
					<button type="button" class="btn btn-danger" onclick="CodeInfoDlg.close()" id="cancel">
						<i class="fa fa-eraser"></i>&nbsp;取消
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="/static/js/plugins/layui/layui.js?t=1498856285724" charset="utf-8"></script>
<link href='/static/js/plugins/chosen/chosen.min.css' rel='stylesheet'/>
<script src='/static/js/plugins/chosen/chosen.jquery.js'></script>
<script>
$(function(){$('.chosen').chosen({})})
layui.use(['form'], function(){form = layui.form;});
layui.use('element', function(){
	var element = layui.element;
	element.on('tab(test)', function(elem){
		$(".chosen-container").css('width','100%');
	});
});


$(function(){
	$("#type").change(function(){
		var type = $(this).val().toString();
		switch(type){
			case '3':
				$("#bs_icon").val('plus');
				$("#block_name").val('创建数据');
			break;
			
			case '4':
				$("#bs_icon").val('edit');
				$("#block_name").val('编辑数据');
			break;
			
			case '14':
				$("#bs_icon").val('edit');
				$("#block_name").val('批量编辑数据');
			break;
			
			case '5':
				$("#bs_icon").val('trash');
				$("#block_name").val('删除数据');
			break;
			
			case '6':
				$("#bs_icon").val('pencil');
				$("#block_name").val('修改状态');
				$("#remark").val('');
			break;
			
			case '7':
				$("#bs_icon").val('edit');
				$("#block_name").val('数值加');
			break;
			
			case '8':
				$("#bs_icon").val('edit');
				$("#block_name").val('数值减');
			break;
			
			case '9':
				$("#bs_icon").val('lock');
				$("#block_name").val('修改密码');
			break;
			
			case '10':
				$("#bs_icon").val('plus');
				$("#block_name").val('跳转链接');
			break;
			
			case '11':
				$("#bs_icon").val('plus');
				$("#block_name").val('弹窗连接');
			break;
			
			case '12':
				$("#bs_icon").val('download');
				$("#block_name").val('数据导出');
			break;
			
			case '13':
				$("#bs_icon").val('upload');
				$("#block_name").val('数据导入');
			break;
			
			case '17':
				$("#block_name").val('账号密码登录');
			break;
			
			case '18':
				$("#block_name").val('发送短信验证码');
			break;
			
			case '19':
				$("#block_name").val('手机号登录');
			break;
			
		}
	});
	
})

var CodeInfoDlg = {
	CodeInfoData: {},
	deptZtree: null,
	pNameZtree: null,
	validateFields: {
		name: {
			validators: {
				notEmpty: {
					message: '操作名不能为空'
	 			}
	 		}
	 	},
		action_name: {
			validators: {
				notEmpty: {
					message: '方法不能为空'
	 			},
				regexp: {
					regexp: /^[a-zA-Z_]+$/,
					message: '大小写字母组合'
	 			},
	 		}
	 	},
		type: {
			validators: {
				notEmpty: {
					message: '方法类型不能为空'
	 			}
	 		}
	 	},
		pagesize: {
			validators: {
				regexp: {
					regexp: /^[0-9]*$/,
					message: '请输入整数'
	 			}
	 		}
	 	},
		
	 }
}


CodeInfoDlg.clearData = function () {
	 this.CodeInfoData = {};
};


CodeInfoDlg.set = function (key, val) {
	 this.CodeInfoData[key] = (typeof value == "undefined") ? $("#" + key).val() : value;
	 return this;
};


CodeInfoDlg.get = function (key) {
	 return $("#" + key).val();
};


CodeInfoDlg.close = function () {
	 var index = parent.layer.getFrameIndex(window.name);
	 parent.layer.close(index);
};


CodeInfoDlg.collectData = function () {
	this.set('id').set('menu_id').set('name').set('action_name').set('type').set('block_name').set('remark').set('sortid').set('lable_color').set('bs_icon').set('relate_table').set('relate_field').set('list_field').set('orderby').set('sql_query').set('default_orderby').set('pagesize').set('jump').set('tree_config').set('cache_time').set('request_type').set('do_condition');
};

CodeInfoDlg.icon = function () {
	var index = layer.open({type: 2,title: '设置图标',area: ['800px', '500px'],fix: false, maxmin: true,content: Feng.ctxPath + '/Base/icon/field/bs_icon'});
	this.layerIndex = index;
}


CodeInfoDlg.config = function () {
	var index = layer.open({type: 2,title: '操作配置说明',area: ['100%', '500px'],fix: false, maxmin: true,content: Feng.ctxPath + '/Sys.Action/config'});
	this.layerIndex = index;
}



CodeInfoDlg.add = function () {
	 this.clearData();
	 this.collectData();
	 if (!this.validate()) {
	 	return;
	 }

	 var is_controller_create = $("input[name = 'is_controller_create']:checked").val();
	 var is_service_create = $("input[name = 'is_service_create']:checked").val();
	 var is_view_create = $("input[name = 'is_view_create']:checked").val();
	 var is_view = $("input[name = 'is_view']:checked").val();
	 var log_status = $("input[name = 'log_status']:checked").val();
	 var api_auth = $("input[name = 'api_auth']:checked").val();
	 var sms_auth = $("input[name = 'sms_auth']:checked").val();
	 var captcha_auth = $("input[name = 'captcha_auth']:checked").val();
	 var button_status = $("input[name = 'button_status']:checked").val();
	 var fields = '';
     $('input[name="fields"]:checked').each(function(){ 
		fields += ',' + $(this).val();
     }); 
	 fields = fields.substr(1);
	 
	 var tip = '添加';
	 var ajax = new $ax(Feng.ctxPath + "/Sys.Action/add", function (data) {
	 	if ('00' === data.status) {
	 		Feng.success(tip + "成功" );
	 		window.parent.CodeGoods.table.refresh();
	 		CodeInfoDlg.close();
	 	} else {
	 		Feng.error(tip + "失败！" + data.msg + "！");
		 }
	 }, function (data) {
	 	Feng.error("操作失败!" + data.responseJSON.message + "!");
	 });
	 ajax.set('is_controller_create',is_controller_create);
	 ajax.set('is_service_create',is_service_create);
	 ajax.set('is_view_create',is_view_create);
	 ajax.set('is_view',is_view);
	 ajax.set('log_status',log_status);
	 ajax.set('api_auth',api_auth);
	 ajax.set('sms_auth',sms_auth);
	 ajax.set('captcha_auth',captcha_auth);
	 ajax.set('button_status',button_status);
	 ajax.set('fields',fields);
	 ajax.set(this.CodeInfoData);
	 ajax.start();
};


CodeInfoDlg.update = function () {
	 this.clearData();
	 this.collectData();
	 if (!this.validate()) {
	 	return;
	 }

	 var is_controller_create = $("input[name = 'is_controller_create']:checked").val();
	 var is_service_create = $("input[name = 'is_service_create']:checked").val();
	 var is_view_create = $("input[name = 'is_view_create']:checked").val();
	 var is_view = $("input[name = 'is_view']:checked").val();
	 var log_status = $("input[name = 'log_status']:checked").val();
	 var api_auth = $("input[name = 'api_auth']:checked").val();
	 var sms_auth = $("input[name = 'sms_auth']:checked").val();
	 var captcha_auth = $("input[name = 'captcha_auth']:checked").val();
	 var button_status = $("input[name = 'button_status']:checked").val();
	 var fields = '';
     $('input[name="fields"]:checked').each(function(){ 
		fields += ',' + $(this).val();
     }); 
	 fields = fields.substr(1);
	 var tip = '修改';
	 var ajax = new $ax(Feng.ctxPath + "/Sys.Action/update", function (data) {
	 	if ('00' === data.status) {
	 		Feng.success(tip + "成功" );
	 		window.parent.CodeGoods.table.refresh();
	 		CodeInfoDlg.close();
	 	} else {
	 		Feng.error(tip + "失败！" + data.msg + "！");
		 }
	 }, function (data) {
	 	Feng.error("操作失败!" + data.responseJSON.message + "!");
	 });

	 ajax.set('is_controller_create',is_controller_create);
	 ajax.set('is_service_create',is_service_create);
	 ajax.set('is_view_create',is_view_create);
	 ajax.set('is_view',is_view);
	 ajax.set('log_status',log_status);
	 ajax.set('api_auth',api_auth);
	 ajax.set('sms_auth',sms_auth);
	 ajax.set('captcha_auth',captcha_auth);
	 ajax.set('button_status',button_status);
	 ajax.set('fields',fields);
	 ajax.set(this.CodeInfoData);
	 ajax.start();
};

CodeInfoDlg.fast = function () {
	 this.clearData();
	 this.collectData();
	 if (!this.validate()) {
	 	return;
	 }

	 var actions = '';
     $('input[name="action"]:checked').each(function(){ 
		actions += ',' + $(this).val();
     }); 
	 actions = actions.substr(1);
	 
	 var tip = '添加';
	 var ajax = new $ax(Feng.ctxPath + "/Sys.Action/fast", function (data) {
	 	if ('00' === data.status) {
	 		Feng.success(tip + "成功" );
	 		window.parent.CodeGoods.table.refresh();
	 		CodeInfoDlg.close();
	 	} else {
	 		Feng.error(tip + "失败！" + data.msg + "！");
		 }
	 }, function (data) {
	 	Feng.error("操作失败!" + data.responseJSON.message + "!");
	 });
	 ajax.set('actions',actions);
	 ajax.set(this.CodeInfoData);
	 ajax.start();
};




CodeInfoDlg.validate = function () {
	  $('#CodeInfoForm').data("bootstrapValidator").resetForm();
	  $('#CodeInfoForm').bootstrapValidator('validate');
	  return $("#CodeInfoForm").data('bootstrapValidator').isValid();
};


$(function () {
	   Feng.initValidator("CodeInfoForm", CodeInfoDlg.validateFields);
});




</script>


</div>
<script src="/static/js/content.js?v=1.0.0"></script>

</body>
</html>
