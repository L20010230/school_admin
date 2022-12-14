<?php /*a:2:{s:90:"/www/wwwroot/senior.test.jiayuanxueyuan.cn/app/admin/controller/Sys/view/action/index.html";i:1587946676;s:80:"/www/wwwroot/senior.test.jiayuanxueyuan.cn/app/admin/view/common/_container.html";i:1602393978;}*/ ?>
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
	
<div class="row">
	<div class="col-sm-12">
		<div class="ibox float-e-margins">
			<div class="ibox-content">
				<div class="row row-lg">
					<div class="col-sm-12">
						<div class="btn-group-sm" id="CodeGoodsTableToolbar" role="group">
							<button type="button" class="btn btn-success button-margin" onclick="CodeGoods.add()">
								<i class="glyphicon glyphicon-plus" aria-hidden="true"></i> 创建
							</button>
							<button type="button" class="btn btn-primary button-margin" onclick="CodeGoods.update()">
								<i class="glyphicon glyphicon-pencil" aria-hidden="true"></i> 修改
							</button>
							<button type="button" class="btn btn-danger button-margin" onclick="CodeGoods.delete()">
								<i class="glyphicon glyphicon-trash" aria-hidden="true"></i> 删除
							</button>
							<button type="button" class="btn btn-warning button-margin" onclick="CodeGoods.fast()">
								<i class="glyphicon glyphicon-plus" aria-hidden="true"></i> 快速创建
							</button>
							<button type="button" class="btn btn-info button-margin" onclick="CodeGoods.createCode()">
								<i class="glyphicon glyphicon-pencil"></i>&nbsp;生成代码
							</button>
						</div>
						
						<table id="CodeGoodsTable" data-mobile-responsive="true"></table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	var CodeGoods = {id: "CodeGoodsTable",seItem: null,table: null,layerIndex: -1};

	CodeGoods.initColumn = function () {
 		return [
 			{field: 'selectItem', radio: true},
 			{title: '编号', field: 'id', visible: true, align: 'center', valign: 'middle'},
			{title: '排序', field: 'id', visible: true, align: 'center', valign: 'middle',formatter: 'CodeGoods.arrowFormatter'},
			{title: '操作名称', field: 'name', visible: true, align: 'left', valign: 'middle'},
 			{title: '方法', field: 'action_name', visible: true, align: 'center', valign: 'middle'},
 			{title: '方法类型', field: 'type', visible: true, align: 'left', valign: 'middle'},
 			{title: '控制器方法生成', field: 'is_controller_create', visible: true, align: 'center', valign: 'middle',formatter: 'CodeGoods.controllerFormatter'},
			{title: '服务层方法生成', field: 'is_service_create', visible: true, align: 'center', valign: 'middle',formatter: 'CodeGoods.serviceFormatter'},
			{title: '视图生成', field: 'is_view_create', visible: true, align: 'center', valign: 'middle',formatter: 'CodeGoods.viewFormatter'},
			{title: '操作按钮显示', field: 'is_view', visible: true, align: 'center', valign: 'middle',formatter: 'CodeGoods.showFormatter'},
			{title: '配置信息', field: 'remark', visible: true, align: 'center', valign: 'middle'},
			{title: '排序', field: 'sortid', visible: true, align: 'center', valign: 'middle',formatter: 'CodeGoods.sortFormatter'},
			{title: '操作', field: 'id', visible: true, align: 'center', valign: 'middle',formatter: 'CodeGoods.buttonFormatter'},
 		];
 	};
	
	CodeGoods.buttonFormatter = function(value,row,index) {
		if(value){
			var str= '';
			str += '<button type="button" class="btn btn-primary btn-xs" title="修改"  onclick="CodeGoods.update('+value+')"><i class="fa fa-edit"></i> 修改</button>&nbsp;'
			str += '<button type="button" class="btn btn-danger btn-xs" title="删除"  onclick="CodeGoods.delete('+value+')"><i class="fa fa-trash"></i> 删除</button>&nbsp;'
			return str;
		}
	}
	
	CodeGoods.controllerFormatter = function(value,row,index) {		
		if(value == 0){
			return '<input class="mui-switch mui-switch-animbg is_controller_create'+row.id+'"  type="checkbox" onclick="CodeGoods.updatestatus('+row.id+',1,\'is_controller_create\')">';
		}else{
			return '<input class="mui-switch mui-switch-animbg is_controller_create'+row.id+'" type="checkbox" onclick="CodeGoods.updatestatus('+row.id+',0,\'is_controller_create\')" checked>';
		}
	}
	
	CodeGoods.serviceFormatter = function(value,row,index) {		
		if(value == 0){
			return '<input class="mui-switch mui-switch-animbg is_service_create'+row.id+'"  type="checkbox" onclick="CodeGoods.updatestatus('+row.id+',1,\'is_service_create\')">';
		}else{
			return '<input class="mui-switch mui-switch-animbg is_service_create'+row.id+'" type="checkbox" onclick="CodeGoods.updatestatus('+row.id+',0,\'is_service_create\')" checked>';
		}
	}
	
	CodeGoods.viewFormatter = function(value,row,index) {		
		if(value == 0){
			return '<input class="mui-switch mui-switch-animbg is_view_create'+row.id+'"  type="checkbox" onclick="CodeGoods.updatestatus('+row.id+',1,\'is_view_create\')">';
		}else{
			return '<input class="mui-switch mui-switch-animbg is_view_create'+row.id+'" type="checkbox" onclick="CodeGoods.updatestatus('+row.id+',0,\'is_view_create\')" checked>';
		}
	}
	
	CodeGoods.logFormatter = function(value,row,index) {
		if(value == 1){
			return '<input class="mui-switch mui-switch-animbg log_status'+row.id+'" type="checkbox" onclick="CodeGoods.updatestatus('+row.id+',0,\'log_status\')" checked>';
		}else{
			return '<input class="mui-switch mui-switch-animbg log_status'+row.id+'"  type="checkbox" onclick="CodeGoods.updatestatus('+row.id+',1,\'log_status\')">';
		}
	}
	
	CodeGoods.showFormatter = function(value,row,index) {		
		if(value == 0){
			return '<input class="mui-switch mui-switch-animbg is_view'+row.id+'"  type="checkbox" onclick="CodeGoods.updatestatus('+row.id+',1,\'is_view\')">';
		}else{
			return '<input class="mui-switch mui-switch-animbg is_view'+row.id+'" type="checkbox" onclick="CodeGoods.updatestatus('+row.id+',0,\'is_view\')" checked>';
		}
	}
	
	CodeGoods.updatestatus = function(pk,value,field) {	
		var ajax = new $ax(Feng.ctxPath + "/Sys.Action/updateExt", function (data) {
			if ('00' !== data.status) {
				Feng.error(data.msg);
				$("."+field+pk).prop("checked",!$("."+field+pk).prop("checked"));
			}
		});
		var val = $("."+field+pk).prop("checked") ? 1 : 0;
		ajax.set('id', pk);
		ajax.set(field, val);
		ajax.start();
	}
	

	CodeGoods.formParams = function() {
		var queryData = {};
		return queryData;
	}

	CodeGoods.check = function () {
		var selected = $('#' + this.id).bootstrapTable('getSelections');
		if(selected.length == 0){
			Feng.info("请先选中表格中的某一记录！");
			return false;
		}else{
			CodeGoods.seItem = selected[0];
			return true;
		}
	};

	CodeGoods.add = function () {
		var index = layer.open({type: 2,title: '添加方法',area: ['100%', '100%'],fix: false, maxmin: true,content: Feng.ctxPath + '/Sys.Action/add?menu_id=<?php echo $menu_id; ?>'});
		this.layerIndex = index;
	}
	
	CodeGoods.fast = function () {
		var index = layer.open({type: 2,title: '快捷生成',area: ['600px', '350px'],fix: false, maxmin: true,content: Feng.ctxPath + '/Sys.Action/fast?menu_id=<?php echo $menu_id; ?>'});
		this.layerIndex = index;
	}


	CodeGoods.update = function (value) {
		if(value){
			var index = layer.open({type: 2,title: '修改方法',area: ['100%', '100%'],fix: false, maxmin: true,content: Feng.ctxPath + '/Sys.Action/update?id='+value});
		}else{
			if (this.check()) {
				var idx = this.seItem.id;
				var index = layer.open({type: 2,title: '修改方法',area: ['100%', '100%'],fix: false, maxmin: true,content: Feng.ctxPath + '/Sys.Action/update?id='+idx});
				this.layerIndex = index;
			}
		}
	}
	
	CodeGoods.delete = function(value) {
		if(value){
			Feng.confirm("确定操作", function () {
				var ajax = new $ax(Feng.ctxPath + "/Sys.Action/delete", function (data) {
					if ('00' === data.status) {
						Feng.success(data.msg);
						CodeGoods.table.refresh();
					} else {
						Feng.error(data.msg);
					}
				});
				ajax.set('id', value);
				ajax.start();
			});
		}else{
			if (this.check()) {
				var tip = '确定操作';
				var id = this.seItem.id;
				var operation = function() {
					var ajax = new $ax(Feng.ctxPath + "/Sys.Action/delete",
							function(data) {
								if ('00' === data.status) {
									Feng.success(data.msg);
									CodeGoods.table.refresh();
								} else{
									Feng.error(data.msg + "！", 10000);
								}
							});
					ajax.set("id", id);
					ajax.start();	
				};
				Feng.confirm("是否" + tip, operation);
			}
		}
	};
	
	CodeGoods.arrowFormatter = function(value,row,index) {
		return '<i class="fa fa-long-arrow-up" onclick="CodeGoods.arrowsort('+value+',1)" style="cursor:pointer;" title="上移"></i>&nbsp;<i class="fa fa-long-arrow-down" style="cursor:pointer;" onclick="CodeGoods.arrowsort('+value+',2)"  title="下移"></i>';
	}
	
	CodeGoods.sortFormatter = function(value,row,index) {
		return '<input type="text" value="'+value+'" onblur="CodeGoods.upsort('+row.id+',this.value)" style="width:50px; border:1px solid #ddd; text-align:center">';
	}
	
	CodeGoods.arrowsort = function (value,type) {
		var ajax = new $ax(Feng.ctxPath + "/Sys.Action/arrowsort", function (data) {
			if ('00' === data.status) {
					Feng.success(data.msg);
					CodeGoods.table.refresh();
			} else {
				Feng.error(data.msg);
			}
		});
		ajax.set('id', value);
		ajax.set('type', type);
		ajax.start();
	}
	
	CodeGoods.upsort = function(id,sortid)
    {
		var ajax = new $ax(Feng.ctxPath + "/Sys.Action/setSort", function (data) {
			if ('00' === data.status) {
			} else {
				Feng.error(data.msg);
			}
		});
		ajax.set('sortid', sortid);
		ajax.set('id', id);
		ajax.start();
    }

	CodeGoods.search = function() {
		CodeGoods.table.refresh({query : CodeGoods.formParams()});
	};
	
	CodeGoods.createCode = function(type) {
		var tip = '确定操作';
		var menu_id = '<?php echo app('request')->get('menu_id'); ?>';
		var operation = function() {
			var ajax = new $ax(Feng.ctxPath + "/Sys.Build/create",
					function(data) {
						if ('00' === data.status) {
							Feng.success(data.msg);
						} else{
							Feng.error(data.msg + "！", 10000);
						}
					});
			ajax.set("menu_id", menu_id);
			ajax.start();
		};
		Feng.confirm("是否" + tip, operation);		
	};

	$(function() {
		var defaultColunms = CodeGoods.initColumn();
		var table = new BSTable(CodeGoods.id, Feng.ctxPath + "/Sys.Action/index?menu_id=<?php echo $menu_id; ?>",defaultColunms);
		table.setPaginationType("server");
		table.setQueryParams(CodeGoods.formParams());
		CodeGoods.table = table.init();
	});
</script>

</div>
<script src="/static/js/content.js?v=1.0.0"></script>

</body>
</html>
