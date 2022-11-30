<?php /*a:2:{s:80:"/www/wwwroot/senior.test.jiayuanxueyuan.cn/app/admin/view/member_menu/index.html";i:1669698737;s:80:"/www/wwwroot/senior.test.jiayuanxueyuan.cn/app/admin/view/common/_container.html";i:1602393978;}*/ ?>
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
						<div class="row" id="searchGroup">
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-btn">
										<button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">菜单名称</button>
									</div>
									<input type="text" autocomplete="off" class="form-control" id="menu_name" placeholder="菜单名称" />
								</div>
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-btn">
										<button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">菜单URL</button>
									</div>
									<input type="text" autocomplete="off" class="form-control" id="url" placeholder="菜单URL" />
								</div>
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-btn">
										<button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">重定向</button>
									</div>
									<input type="text" autocomplete="off" class="form-control" id="redirect" placeholder="重定向" />
								</div>
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-btn">
										<button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">路由name</button>
									</div>
									<input type="text" autocomplete="off" class="form-control" id="route_url" placeholder="路由name" />
								</div>
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-btn">
										<button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">路由组件路径</button>
									</div>
									<input type="text" autocomplete="off" class="form-control" id="route_path" placeholder="路由组件路径" />
								</div>
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-btn">
										<button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">上级菜单</button>
									</div>
									<select class="form-control chosen" id="pid">
										<option value="">请选择</option>
										<?php $_result=htmlOutList(\think\facade\Db::connect('mysql')->query('SELECT member_menu_id,menu_name,pid FROM `cd_member_menu`'),false);if($_result)$_result = formartList(explode(",","member_menu_id,pid,menu_name,menu_name"),$_result);foreach($_result as $key=>$sql):?>
										<option value="<?php echo $sql['member_menu_id']; ?>"><?php echo $sql['menu_name']; ?></option>
										<?php endforeach?>
									</select>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-btn">
										<button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">显示顺序</button>
									</div>
									<input type="text" autocomplete="off" class="form-control" id="menu_order" placeholder="显示顺序" />
								</div>
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-btn">
										<button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">菜单图标</button>
									</div>
									<input type="text" autocomplete="off" class="form-control" id="menu_ico" placeholder="菜单图标" />
								</div>
							</div>
							<div class="col-sm-2">
								<div class="input-group">
									<div class="input-group-btn">
										<button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">侧边显示</button>
									</div>
									<select class="form-control" id="broadside_status">
										<option value="">请选择</option>
										<option value="1">否</option>
										<option value="2">是</option>
									</select>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="input-group">
									<div class="input-group-btn">
										<button data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">创建时间范围</button>
									</div>
									<input type="text" autocomplete="off" placeholder="时间范围" class="form-control" id="create_time">
								</div>
							</div>
							<!-- search end -->
							<div class="col-sm-1">
								<button type="button" class="btn btn-success " onclick="CodeGoods.search()" id="">
									<i class="fa fa-search"></i>&nbsp;搜索
								</button>
							</div>
						</div>
						<div class="btn-group-sm" id="CodeGoodsTableToolbar" role="group">
						<?php if(in_array('admin/MemberMenu/add',session('admin.nodes')) || session('admin.role_id') == 1): ?>
						<button type="button" id="add" class="btn btn-primary button-margin" onclick="CodeGoods.add()">
						<i class="fa fa-plus"></i>&nbsp;添加
						</button>
						<?php endif; if(in_array('admin/MemberMenu/update',session('admin.nodes')) || session('admin.role_id') == 1): ?>
						<button type="button" id="update" class="btn btn-success button-margin" onclick="CodeGoods.update()">
						<i class="fa fa-pencil"></i>&nbsp;修改
						</button>
						<?php endif; if(in_array('admin/MemberMenu/delete',session('admin.nodes')) || session('admin.role_id') == 1): ?>
						<button type="button" id="delete" class="btn btn-danger button-margin" onclick="CodeGoods.delete()">
						<i class="fa fa-trash"></i>&nbsp;删除
						</button>
						<?php endif; if(in_array('admin/MemberMenu/view',session('admin.nodes')) || session('admin.role_id') == 1): ?>
						<button type="button" id="view" class="btn btn-info button-margin" onclick="CodeGoods.view()">
						<i class="fa fa-eye"></i>&nbsp;查看详情
						</button>
						<?php endif; ?>
						</div>
						<table id="CodeGoodsTable" data-mobile-responsive="true" data-click-to-select="true">
							<thead><tr><th data-field="selectItem" data-checkbox="true"></th></tr></thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<link href='/static/js/plugins/chosen/chosen.min.css' rel='stylesheet'/>
<script src='/static/js/plugins/chosen/chosen.jquery.js'></script>
<script>$(function(){$('.chosen').chosen({search_contains: true})})</script>
<script>
	var CodeGoods = {id: "CodeGoodsTable",seItem: null,table: null,layerIndex: -1};

	CodeGoods.initColumn = function () {
 		return [
 			{field: 'selectItem', checkbox: true},
 			{title: '编号', field: 'member_menu_id', visible: true, align: 'center', valign: 'middle',sortable: true},
 			{title: '菜单名称', field: 'menu_name', visible: true, align: 'center', valign: 'middle',sortable: true},
 			{title: '菜单URL', field: 'url', visible: true, align: 'center', valign: 'middle',sortable: true},
 			{title: '重定向', field: 'redirect', visible: true, align: 'center', valign: 'middle',sortable: true},
 			{title: '路由name', field: 'route_url', visible: true, align: 'center', valign: 'middle',sortable: true},
 			{title: '路由组件路径', field: 'route_path', visible: true, align: 'center', valign: 'middle',sortable: true},
 			{title: '上级菜单', field: 'pid', visible: true, align: 'center', valign: 'middle',sortable: true},
 			{title: '显示顺序', field: 'menu_order', visible: true, align: 'center', valign: 'middle',sortable: true},
 			{title: '菜单图标', field: 'menu_ico', visible: true, align: 'center', valign: 'middle',sortable: true},
 			{title: '侧边显示', field: 'broadside_status', visible: true, align: 'center', valign: 'middle',sortable: true,formatter:CodeGoods.broadside_statusFormatter},
 			{title: '创建时间', field: 'create_time', visible: true, align: 'center', valign: 'middle',sortable: true,formatter:CodeGoods.create_timeFormatter},
 			{title: '操作', field: '', visible: true, align: 'center', valign: 'middle',formatter: 'CodeGoods.buttonFormatter'},
 		];
 	};

	CodeGoods.buttonFormatter = function(value,row,index) {
		if(row.member_menu_id){
			var str= '';
			<?php if(in_array('admin/MemberMenu/update',session('admin.nodes')) || session('admin.role_id') == 1): ?>
			str += '<button type="button" class="btn btn-success btn-xs" title="修改"  onclick="CodeGoods.update('+row.member_menu_id+')"><i class="fa fa-pencil"></i>&nbsp;修改</button>&nbsp;';
			<?php endif; if(in_array('admin/MemberMenu/delete',session('admin.nodes')) || session('admin.role_id') == 1): ?>
			str += '<button type="button" class="btn btn-danger btn-xs" title="删除"  onclick="CodeGoods.delete('+row.member_menu_id+')"><i class="fa fa-trash"></i>&nbsp;删除</button>&nbsp;';
			<?php endif; ?>
			return str;
		}
	}

	CodeGoods.broadside_statusFormatter = function(value,row,index) {
		if(value !== null){
			var value = value.toString();
			switch(value){
				case '1':
					return '否';
				break;
				case '2':
					return '是';
				break;
			}
		}
	}

	CodeGoods.create_timeFormatter = function(value,row,index) {
		if(value){
			return formatDateTime(value,'Y-m-d H:i:s');	
		}
	}

	CodeGoods.formParams = function() {
		var queryData = {};
		queryData['offset'] = 0;
		queryData['menu_name'] = $("#menu_name").val();
		queryData['url'] = $("#url").val();
		queryData['redirect'] = $("#redirect").val();
		queryData['route_url'] = $("#route_url").val();
		queryData['route_path'] = $("#route_path").val();
		queryData['pid'] = $("#pid").val();
		queryData['menu_order'] = $("#menu_order").val();
		queryData['menu_ico'] = $("#menu_ico").val();
		queryData['broadside_status'] = $("#broadside_status").val();
		queryData['create_time_start'] = $("#create_time").val().split(" - ")[0];
		queryData['create_time_end'] = $("#create_time").val().split(" - ")[1];
		return queryData;
	}

	CodeGoods.check = function () {
		var selected = $('#' + this.id).bootstrapTable('getSelections');
		if(selected.length == 0){
			Feng.info("请先选中表格中的某一记录！");
			return false;
		}else{
			CodeGoods.seItem = selected;
			return true;
		}
	};

	CodeGoods.add = function (value) {
		var url = location.search;
		var index = layer.open({type: 2,title: '添加',area: ['800px', '100%'],fix: false, maxmin: true,content: Feng.ctxPath + '/MemberMenu/add'+url});
		this.layerIndex = index;
		if(!IsPC()){layer.full(index)}
	}


	CodeGoods.update = function (value) {
		if(value){
			var index = layer.open({type: 2,title: '修改',area: ['800px', '100%'],fix: false, maxmin: true,content: Feng.ctxPath + '/MemberMenu/update?member_menu_id='+value});
			if(!IsPC()){layer.full(index)}
		}else{
			if (this.check()) {
				var idx = '';
				$.each(CodeGoods.seItem, function() {
					idx += ',' + this.member_menu_id;
				});
				idx = idx.substr(1);
				if(idx.indexOf(",") !== -1){
					Feng.info("请选择单条数据！");
					return false;
				}
				var index = layer.open({type: 2,title: '修改',area: ['800px', '100%'],fix: false, maxmin: true,content: Feng.ctxPath + '/MemberMenu/update?member_menu_id='+idx});
				this.layerIndex = index;
				if(!IsPC()){layer.full(index)}
			}
		}
	}


	CodeGoods.delete = function (value) {
		if(value){
			Feng.confirm("是否删除选中项？", function () {
				var ajax = new $ax(Feng.ctxPath + "/MemberMenu/delete", function (data) {
					if ('00' === data.status) {
						Feng.success(data.msg);
						CodeGoods.table.refresh();
					} else {
						Feng.error(data.msg);
					}
				});
				ajax.set('member_menu_id', value);
				ajax.start();
			});
		}else{
			if (this.check()) {
				var idx = '';
				$.each(CodeGoods.seItem, function() {
					idx += ',' + this.member_menu_id;
				});
				idx = idx.substr(1);
				Feng.confirm("是否删除选中项？", function () {
					var ajax = new $ax(Feng.ctxPath + "/MemberMenu/delete", function (data) {
						if ('00' === data.status) {
							Feng.success(data.msg,1000);
							CodeGoods.table.refresh();
						} else {
							Feng.error(data.msg,1000);
						}
					});
					ajax.set('member_menu_id', idx);
					ajax.start();
				});
			}
		}
	}


	CodeGoods.view = function (value) {
		if(value){
			var index = layer.open({type: 2,title: '查看详情',area: ['800px', '100%'],fix: false, maxmin: true,content: Feng.ctxPath + '/MemberMenu/view?member_menu_id='+value});
			if(!IsPC()){layer.full(index)}
		}else{
			if (this.check()) {
				var idx = '';
				$.each(CodeGoods.seItem, function() {
					idx += ',' + this.member_menu_id;
				});
				idx = idx.substr(1);
				if(idx.indexOf(",") !== -1){
					Feng.info("请选择单条数据！");
					return false;
				}
				var index = layer.open({type: 2,title: '查看详情',area: ['800px', '100%'],fix: false, maxmin: true,content: Feng.ctxPath + '/MemberMenu/view?member_menu_id='+idx});
				this.layerIndex = index;
				if(!IsPC()){layer.full(index)}
			}
		}
	}


	CodeGoods.search = function() {
		CodeGoods.table.refresh({query : CodeGoods.formParams()});
	};

	$(function() {
		var defaultColunms = CodeGoods.initColumn();
		var url = location.search;
		var table = new BSTable(CodeGoods.id, Feng.ctxPath+"/MemberMenu/index"+url,defaultColunms,20);
		table.setPaginationType("server");
		table.setQueryParams(CodeGoods.formParams());
		CodeGoods.table = table.init();
	});
	laydate.render({elem: '#create_time',type: 'datetime',range:true,
		ready: function(date){
			$(".layui-laydate-footer [lay-type='datetime'].laydate-btns-time").click();
			$(".laydate-main-list-1 .layui-laydate-content li ol li:last-child").click();
			$(".layui-laydate-footer [lay-type='date'].laydate-btns-time").click();
		}
	});
</script>

</div>
<script src="/static/js/content.js?v=1.0.0"></script>

</body>
</html>
