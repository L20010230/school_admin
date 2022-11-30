<?php /*a:2:{s:91:"/www/wwwroot/senior.test.jiayuanxueyuan.cn/app/admin/controller/Sys/view/menu/api_info.html";i:1609722924;s:80:"/www/wwwroot/senior.test.jiayuanxueyuan.cn/app/admin/view/common/_container.html";i:1602393978;}*/ ?>
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
<?php if($info['app_id'] == ''): ?>
<input type="hidden" name='app_id' id='app_id' value="<?php echo $app_id; ?>" />
<?php endif; ?>
<input type="hidden" name='menu_id' id='menu_id' value="<?php echo $info['menu_id']; ?>" />
	<div class="ibox-content layui-form">
		<div class="form-horizontal" id="CodeInfoForm">
			<div class="row" style="margin-top:-20px;">
				<div class="layui-tab layui-tab-brief" lay-filter="test">
					<div class="layui-tab-content" style="margin-top:10px;">
						<div class="layui-tab-item layui-show">
							<div class="col-sm-12">
							<!-- form start -->
					
								<div class="form-group">
									<label class="col-sm-2 control-label">所属父类：</label>
									<div class="col-sm-9">
										<select lay-ignore name="pid" class="form-control" id="pid">
											<option value="">请选择父类</option>
											<?php if(is_array($menuList) || $menuList instanceof \think\Collection || $menuList instanceof \think\Paginator): $i = 0; $__LIST__ = $menuList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
											<option value="<?php echo $vo['menu_id']; ?>" <?php if($vo['menu_id'] == $info['pid']): ?>selected<?php endif; ?>><?php echo $vo['title']; ?></option>
											<?php endforeach; endif; else: echo "" ;endif; ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">接口分组名称：</label>
									<div class="col-sm-9">
										<input type="text" autocomplete="off" id="title" value="<?php echo $info['title']; ?>" name="title" class="form-control" placeholder="请输入菜单名称">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">控制器名：</label>
									<div class="col-sm-9">
										<input type="text" value="<?php echo $info['controller_name']; ?>" id="controller_name" name="controller_name" class="form-control" placeholder="请输入控制器名">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">数据库表名：</label>
									<div class="col-sm-9">
										<input type="text" id="table_name" value="<?php echo $info['table_name']; ?>" name="table_name" class="form-control" placeholder="请输入数据库表名">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">主键ID：</label>
									<div class="col-sm-9">
										<input type="text" id="pk_id" value="<?php echo $info['pk_id']; ?>" name="pk_id" class="form-control" placeholder="请输入主键ID">
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-2 control-label">是否生成代码：</label>
									<div class="col-sm-9">
									<?php if(!isset($info['is_create'])){ $info['is_create'] = 1; }; ?>
										<input name="is_create" value="1" type="radio" <?php if($info['is_create'] == 1): ?>checked<?php endif; ?> title="是">
										<input name="is_create" value="0" type="radio" <?php if($info['is_create'] == 0): ?>checked<?php endif; ?> title="否">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">是否生成数据表：</label>
									<div class="col-sm-9">
									<?php if(!isset($info['table_status'])){ $info['table_status'] = 0; }; ?>
										<input name="table_status" value="1" type="radio" <?php if($info['table_status'] == 1): ?>checked<?php endif; ?>  title="是">
										<input name="table_status" value="0" type="radio" <?php if($info['table_status'] == 0): ?>checked<?php endif; ?>  title="否">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">选择数据库：</label>
									<div class="col-sm-9">
										<select lay-ignore name="connect" class="form-control" id="connect">
											<option value="">请选择数据库连接</option>
											<?php $connectlist = config('database.connections');if(is_array($connectlist) || $connectlist instanceof \think\Collection || $connectlist instanceof \think\Paginator): $i = 0; $__LIST__ = $connectlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
											<option value="<?php echo $key; ?>" <?php if($info['connect'] == $key): ?>selected<?php endif; ?>><?php echo $key; ?></option>
											<?php endforeach; endif; else: echo "" ;endif; ?>
										</select>
									</div>
								</div>
							<!-- form end -->
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="row btn-group-m-t">
				<div class="col-sm-9 col-sm-offset-1">
					<button type="button" class="btn btn-primary" onclick="<?php if($info['app_id'] != ''): ?>CodeInfoDlg.update()<?php else: ?>CodeInfoDlg.add()<?php endif; ?>" id="ensure">
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
layui.use('element', function(){
	var element = layui.element;
	element.on('tab(test)', function(elem){});
});

var CodeInfoDlg = {
	CodeInfoData: {},
	deptZtree: null,
	pNameZtree: null,
	validateFields: {
		title: {
			validators: {
				notEmpty: {
					message: '菜单标题不能为空'
	 			}
	 		}
	 	},
		controller_name: {
			validators: {
				regexp: {
					regexp: /^[0-9a-zA-Z/]+$/,
					message: '大小写字母组合'
	 			},
	 		}
	 	},
		table_name: {
			validators: {
				regexp: {
					regexp: /^[a-zA-Z_0-9]+$/,
					message: '大小写字母组合'
	 			},
	 		}
	 	},
		pk_id: {
			validators: {
				regexp: {
					regexp: /^[a-zA-Z_]+$/,
					message: '大小写字母组合'
	 			},
	 		}
	 	}
		
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
	this.set('menu_id').set('title').set('controller_name').set('table_name').set('pk_id').set('sortid').set('pid').set('url').set('menu_icon').set('tab_menu').set('app_id').set('upload_config_id').set('connect');
};


CodeInfoDlg.icon = function () {
		var index = layer.open({type: 2,title: '设置图标',area: ['800px', '500px'],fix: false, maxmin: true,content: Feng.ctxPath + '/Base/icon/field/menu_icon'});
		this.layerIndex = index;
}


CodeInfoDlg.add = function () {
	 this.clearData();
	 this.collectData();
	 if (!this.validate()) {
	 	return;
	 }
	 
	 var is_create = $("input[name = 'is_create']:checked").val();
	 var is_url = $("input[name = 'is_url']:checked").val();
	 var table_status = $("input[name = 'table_status']:checked").val();
	 var status = $("input[name = 'status']:checked").val();
	 var is_submit = $("input[name = 'is_submit']:checked").val();
	 
	 var tip = '添加';
	 var ajax = new $ax(Feng.ctxPath + "/Sys.Menu/add", function (data) {
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
	 ajax.set('is_create',is_create);
	 ajax.set('is_url',is_url);
	 ajax.set('table_status',table_status);
	 ajax.set('status',status);
	 ajax.set('is_submit',is_submit);
	 ajax.set(this.CodeInfoData);
	 ajax.start();
};


CodeInfoDlg.update = function () {
	 this.clearData();
	 this.collectData();
	 if (!this.validate()) {
	 	return;
	 }
	 
	 var is_create = $("input[name = 'is_create']:checked").val();
	 var is_url = $("input[name = 'is_url']:checked").val();
	 var table_status = $("input[name = 'table_status']:checked").val();
	 var status = $("input[name = 'status']:checked").val();
	 var is_submit = $("input[name = 'is_submit']:checked").val();
	 
	 var tip = '修改';
	 var ajax = new $ax(Feng.ctxPath + "/Sys.Menu/update", function (data) {
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
	 ajax.set('is_create',is_create);
	 ajax.set('is_url',is_url);
	 ajax.set('table_status',table_status);
	 ajax.set('status',status);
	 ajax.set('is_submit',is_submit);
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
