<?php /*a:2:{s:92:"/www/wwwroot/senior.test.jiayuanxueyuan.cn/app/admin/controller/Sys/view/field/api_info.html";i:1594125960;s:80:"/www/wwwroot/senior.test.jiayuanxueyuan.cn/app/admin/view/common/_container.html";i:1602393978;}*/ ?>
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
	<div class="ibox-content layui-form">
		<div class="form-horizontal" id="CodeInfoForm">
			<div class="row" style="margin-top:-20px;">
				<div class="layui-tab layui-tab-brief" lay-filter="test">
					<ul class="layui-tab-title">
						<li class="layui-this">基本信息</li>
						<li>拓展信息</li>
					</ul>
					
					<div class="layui-tab-content" style="margin-top:10px;">
						<div class="layui-tab-item layui-show">
							<div class="col-sm-10">
								<!-- form start -->
							<div class="form-group">
								<label class="col-sm-2 control-label">字段名：</label>
								<div class="col-sm-9">
									<input type="text" value="<?php echo $info['name']; ?>" id="name" name="name" class="form-control" placeholder="请输入字段名称">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">字段：</label>
								<div class="col-sm-9">
									<input type="text" value="<?php echo $info['field']; ?>" id="field" name="field" class="form-control" placeholder="请输入字段">
									<span class="help-block m-b-none">如果是地区三级联动请用|隔开 也支持一级  二级 如province|city|district</span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">字段类型：</label>
								<div class="col-sm-9">
									
									<select lay-ignore name="type" class="form-control" id="type">
										<option value="">请选择</option>
										<?php if(is_array($fieldList) || $fieldList instanceof \think\Collection || $fieldList instanceof \think\Paginator): $i = 0; $__LIST__ = $fieldList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
											<option value="<?php echo $key; ?>" <?php if($info['type'] == $key): ?>selected<?php endif; ?>><?php echo $vo['name']; ?></option>
										<?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">是否搜索：</label>
								<div class="col-sm-9">
								<?php if(!isset($info['search_show'])){ $info['search_show'] = 1; }; ?>
									<input name="search_show" value="1" type="radio" <?php if($info['search_show'] == 1): ?>checked<?php endif; ?> title="是">
									<input name="search_show" value="0" type="radio" <?php if($info['search_show'] == 0): ?>checked<?php endif; ?> title="否">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">是否录入：</label>
								<div class="col-sm-9">
								<?php if(!isset($info['is_post'])){ $info['is_post'] = 1; }; ?>
									<input name="is_post" value="1" type="radio" <?php if($info['is_post'] == 1): ?>checked<?php endif; ?> title="是">
									<input name="is_post" value="0" type="radio" <?php if($info['is_post'] == 0): ?>checked<?php endif; ?> title="否">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label"><?php if($info['id'] != ''): ?>更新<?php else: ?>创建<?php endif; ?>数据表字段：</label>
								<div class="col-sm-9">
								<?php if(!isset($info['is_field'])){ $info['is_field'] = 1; }; ?>
									<input name="is_field" value="1" type="radio" <?php if($info['is_field'] == 1): ?>checked<?php endif; ?> title="是">
									<input name="is_field" value="0" type="radio" <?php if($info['is_field'] == 0): ?>checked<?php endif; ?> title="否">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">字段说明：</label>
								<div class="col-sm-9">
									<textarea id="config"  name="config"  class="form-control" placeholder="请输入字段配置 名称|值"><?php echo $info['config']; ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">字段默认值：</label>
								<div class="col-sm-9">
									<textarea id="default_value" name="block_name" class="form-control" placeholder="表单默认输入值"><?php echo $info['default_value']; ?></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">验证方式：</label>
								<div class="col-sm-9">
									<input value="notEmpty" <?php if(in_array('notEmpty',explode(',',$info['validate']))): ?>checked<?php endif; ?> name="validate" lay-filter="hope" class="checkbox" type="checkbox" title="不为空">	
									<input value="unique" <?php if(in_array('unique',explode(',',$info['validate']))): ?>checked<?php endif; ?> name="validate" lay-filter="hope" class="checkbox" type="checkbox" title="唯一值">	
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">验证规则：</label>
								<div class="col-sm-6">
									<input type="text" id="rule" name="rule" value="<?php echo $info['rule']; ?>" class="form-control" placeholder="字段验证">
								</div>
								<div class="col-sm-2" style="margin-left:-30px;">
									<select lay-ignore name="ruleType" class="form-control" id="ruleType">
										<option value="">验证规则</option>
										<?php if(is_array($ruleList) || $ruleList instanceof \think\Collection || $ruleList instanceof \think\Paginator): $i = 0; $__LIST__ = $ruleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
											<option value="<?php echo $vo; ?>"><?php echo $key; ?></option>
										<?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">错误提示：</label>
								<div class="col-sm-9">
									<input type="text" id="message" name="message" value="<?php echo $info['message']; ?>" class="form-control" placeholder="请输入错误提示">
								</div>
							</div>
				<!-- form end -->
							</div>
						</div>
						
						<div class="layui-tab-item">
							<div class="col-sm-10">
								<div class="form-group">
									<label class="col-sm-2 control-label">搜索方式：</label>
									<div class="col-sm-9">
										<input name="search_type" value="0" <?php if($info['search_type'] == 0): ?>checked<?php endif; ?> type="radio" checked title="精确匹配">
										<input name="search_type" value="1" <?php if($info['search_type'] == 1): ?>checked<?php endif; ?> type="radio" title="模糊搜索">
									</div>
								</div>
								<div class="col-sm-10">
								<div class="form-group">
									<label class="col-sm-2 control-label">字段数据类型：</label>
									<div class="col-sm-9">
										<select lay-ignore name="datatype" class="form-control" id="datatype">
											<option value="">请选择</option>	
											<?php if(is_array($propertyList) || $propertyList instanceof \think\Collection || $propertyList instanceof \think\Paginator): $i = 0; $__LIST__ = $propertyList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
											<option value="<?php echo $vo['name']; ?>" <?php if($info['datatype'] == $vo['name']): ?>selected<?php endif; ?>><?php echo $vo['name']; ?></option>
											<?php endforeach; endif; else: echo "" ;endif; ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">字段长度：</label>
									<div class="col-sm-9">
										<input type="text" id="length" name="length" value="<?php echo $info['length']; ?>" class="form-control" placeholder="请输入字段长度">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">字段索引：</label>
									<div class="col-sm-9">
										<select lay-ignore name="indexdata" class="form-control" id="indexdata">
											<option value="">请选择</option>
											<option value="INDEX" <?php if($info['indexdata'] == 'INDEX'): ?>selected<?php endif; ?>>普通索引</option>
											<option value="UNIQUE" <?php if($info['indexdata'] == 'UNIQUE'): ?>selected<?php endif; ?>>唯一索引</option>
										</select>
									</div>
								</div>
								
							</div>
							</div>
						</div>
						
					</div>
					
				</div>
				
			</div>
			<div class="row btn-group-m-t">
				<div class="col-sm-10">
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
<script>
layui.use(['form'], function () {
	window.form = layui.form;
});

$(function(){
	$("#ruleType").change(function(){
		val = $("#ruleType option:selected").val();
		$("#rule").val(val);
	});
})

$(function(){
	$('#type').change(function() {
		var ajax = new $ax(Feng.ctxPath + "/Sys.Field/getFieldConfig", function (data) {
			$("#length").val(data.maxlen);
			$("#datatype").val(data.name);
		});
		 
		ajax.set('type', $("#type option:selected").val());
		ajax.start();
	 
	})
	
})

$(function(){
	$("#name").blur(function(){
		var ajax = new $ax(Feng.ctxPath + "/Sys.Field/getPy", function (data) {
			$("#field").val(data.fieldname);
		});
		 
		ajax.set('fieldname', $("#name").val());
		ajax.start();
	})
})

layui.use('element', function(){
	var element = layui.element();
	element.on('tab(test)', function(elem){
	});
});

var CodeInfoDlg = {
	CodeInfoData: {},
	deptZtree: null,
	pNameZtree: null,
	validateFields: {
		name: {
			validators: {
				notEmpty: {
					message: '字段名不能为空'
	 			}
	 		}
	 	},
		field: {
			validators: {
				notEmpty: {
					message: '字段不能为空'
	 			},
				<?php  $field_letter_status = !is_null(config('my.field_letter_status')) ? config('my.field_letter_status') : true;if($field_letter_status): ?>
				regexp: {
					regexp: /^[a-z_|0-9]+$/,
					message: '只限制小写字母、数字、下划线'
	 			},
				<?php endif; ?>
	 		}
	 	},
		type: {
			validators: {
				notEmpty: {
					message: '字段类型不能为空'
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
	this.set('id').set('menu_id').set('name').set('field').set('type').set('align').set('config').set('default_value').set('note').set('message').set('sortid').set('sql').set('rule').set('tab_menu_name').set('datatype').set('length').set('indexdata');
};



CodeInfoDlg.add = function () {
	 this.clearData();
	 this.collectData();
	 if (!this.validate()) {
	 	return;
	 }
	 
	 var list_show = $("input[name = 'list_show']:checked").val();
	 var search_show = $("input[name = 'search_show']:checked").val();
	 var search_type = $("input[name = 'search_type']:checked").val();
	 var is_post = $("input[name = 'is_post']:checked").val();
	 var is_field = $("input[name = 'is_field']:checked").val();
	 var validate = '';
     $('input[name="validate"]:checked').each(function(){ 
		validate += ',' + $(this).val();
     }); 
	 validate = validate.substr(1);
	 
	 var tip = '添加';
	 var ajax = new $ax(Feng.ctxPath + "/Sys.Field/add", function (data) {
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
	 ajax.set('is_field',is_field);
	 ajax.set('list_show',list_show);
	 ajax.set('search_show',search_show);
	 ajax.set('search_type',search_type);
	 ajax.set('is_post',is_post);
	 ajax.set('validate',validate);
	 ajax.set(this.CodeInfoData);
	 ajax.start();
};


CodeInfoDlg.update = function () {
	 this.clearData();
	 this.collectData();
	 if (!this.validate()) {
	 	return;
	 }
	 var list_show = $("input[name = 'list_show']:checked").val();
	 var search_show = $("input[name = 'search_show']:checked").val();
	 var search_type = $("input[name = 'search_type']:checked").val();
	 var is_post = $("input[name = 'is_post']:checked").val();
	 var is_field = $("input[name = 'is_field']:checked").val();
	  var validate = '';
     $('input[name="validate"]:checked').each(function(){ 
		validate += ',' + $(this).val();
     }); 
	 validate = validate.substr(1);
	 
	 var tip = '修改';
	 var ajax = new $ax(Feng.ctxPath + "/Sys.Field/update", function (data) {
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
	 ajax.set('is_field',is_field);
	 ajax.set('list_show',list_show);
	 ajax.set('search_show',search_show);
	 ajax.set('search_type',search_type);
	 ajax.set('is_post',is_post);
	 ajax.set('validate',validate);
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
