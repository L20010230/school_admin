<?php /*a:2:{s:78:"/www/wwwroot/senior.test.jiayuanxueyuan.cn/app/admin/view/member_menu/add.html";i:1669698737;s:80:"/www/wwwroot/senior.test.jiayuanxueyuan.cn/app/admin/view/common/_container.html";i:1602393978;}*/ ?>
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
	<div class="ibox-content">
		<div class="form-horizontal" id="CodeInfoForm">
			<div class="row">
				<div class="col-sm-12">
				<!-- form start -->
					<div class="form-group">
						<label class="col-sm-2 control-label">菜单名称：</label>
						<div class="col-sm-9">
							<input type="text" autocomplete="off" id="menu_name" value="" name="menu_name" class="form-control" placeholder="请输入菜单名称">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">菜单URL：</label>
						<div class="col-sm-9">
							<input type="text" autocomplete="off" id="url" value="" name="url" class="form-control" placeholder="请输入菜单URL">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">重定向：</label>
						<div class="col-sm-9">
							<input type="text" autocomplete="off" id="redirect" value="" name="redirect" class="form-control" placeholder="请输入重定向">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">路由name：</label>
						<div class="col-sm-9">
							<input type="text" autocomplete="off" id="route_url" value="" name="route_url" class="form-control" placeholder="请输入路由name">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">路由组件路径：</label>
						<div class="col-sm-9">
							<input type="text" autocomplete="off" id="route_path" value="" name="route_path" class="form-control" placeholder="请输入路由组件路径">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">上级菜单：</label>
						<div class="col-sm-9">
							<?php if(!isset($info['pid'])){ $info['pid'] = ''; }; ?>
							<select lay-ignore name="pid" class="form-control chosen" data-placeholder='请选择上级菜单'  id="pid">
								<option value="">请选择</option>
								<?php $_result=htmlOutList(\think\facade\Db::connect('mysql')->query('SELECT member_menu_id,menu_name,pid FROM `cd_member_menu`'),false);if($_result)$_result = formartList(explode(",","member_menu_id,pid,menu_name,menu_name"),$_result);foreach($_result as $key=>$sql):?>
									<option value="<?php echo $sql['member_menu_id']; ?>" <?php if($info['pid'] == $sql['member_menu_id']): ?>selected<?php endif; ?>><?php echo $sql['menu_name']; ?></option>
								<?php endforeach?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">显示顺序：</label>
						<div class="col-sm-9">
							<input type="text" autocomplete="off" id="menu_order" value="" name="menu_order" class="form-control" placeholder="请输入显示顺序">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">菜单图标：</label>
						<div class="col-sm-9">
							<input type="text" autocomplete="off" id="menu_ico" value="" name="menu_ico" class="form-control" placeholder="请输入菜单图标">
						</div>
					</div>
					<div class="form-group layui-form">
						<label class="col-sm-2 control-label">侧边显示：</label>
						<div class="col-sm-9">
							<?php if(!isset($info['broadside_status'])){ $info['broadside_status'] = '1'; }; ?>
							<input name="broadside_status" value="1" type="radio" <?php if($info['broadside_status'] == '1'): ?>checked<?php endif; ?> title="否">
							<input name="broadside_status" value="2" type="radio" <?php if($info['broadside_status'] == '2'): ?>checked<?php endif; ?> title="是">
						</div>
					</div>
				<!-- form end -->
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="row btn-group-m-t">
				<div class="col-sm-9 col-sm-offset-1">
					<button type="button" class="btn btn-primary" onclick="CodeInfoDlg.add()" id="ensure">
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
<script src="/static/js/upload.js" charset="utf-8"></script>
<script src="/static/js/plugins/layui/layui.js" charset="utf-8"></script>
<link href='/static/js/plugins/chosen/chosen.min.css' rel='stylesheet'/>
<script src='/static/js/plugins/chosen/chosen.jquery.js'></script>
<script>
layui.use(['form'],function(){});
$(function(){$('.chosen').chosen({search_contains: true})})
laydate.render({elem: '#create_time',type: 'datetime',trigger:'click'});
var CodeInfoDlg = {
	CodeInfoData: {},
	validateFields: {
		menu_name: {
			validators: {
				notEmpty: {
					message: '菜单名称不能为空'
	 			},
	 		}
	 	},
		url: {
			validators: {
				notEmpty: {
					message: '菜单URL不能为空'
	 			},
	 		}
	 	},
		route_url: {
			validators: {
				notEmpty: {
					message: '路由name不能为空'
	 			},
	 		}
	 	},
		menu_order: {
			validators: {
				notEmpty: {
					message: '显示顺序不能为空'
	 			},
	 		}
	 	},
		broadside_status: {
			validators: {
				notEmpty: {
					message: '侧边显示不能为空'
	 			},
	 		}
	 	},
	 }
}

CodeInfoDlg.collectData = function () {
	this.set('member_menu_id').set('menu_name').set('url').set('redirect').set('route_url').set('route_path').set('pid').set('menu_order').set('menu_ico').set('create_time');
};

CodeInfoDlg.add = function () {
	 this.clearData();
	 this.collectData();
	 if (!this.validate()) {
	 	return;
	 }
	 var broadside_status = $("input[name = 'broadside_status']:checked").val();
	 var ajax = new $ax(Feng.ctxPath + "/MemberMenu/add", function (data) {
	 	if ('00' === data.status) {
	 		Feng.success(data.msg,1000);
	 		window.parent.CodeGoods.table.refresh();
	 		CodeInfoDlg.close();
	 	} else {
	 		Feng.error(data.msg + "！",1000);
		 }
	 })
	 ajax.set('broadside_status',broadside_status);
	 ajax.set(this.CodeInfoData);
	 ajax.start();
};


</script>
<script src="/static/js/base.js" charset="utf-8"></script>

</div>
<script src="/static/js/content.js?v=1.0.0"></script>

</body>
</html>
