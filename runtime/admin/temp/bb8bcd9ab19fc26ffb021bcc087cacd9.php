<?php /*a:2:{s:81:"/www/wwwroot/senior.test.jiayuanxueyuan.cn/app/admin/view/member_role/update.html";i:1669699274;s:80:"/www/wwwroot/senior.test.jiayuanxueyuan.cn/app/admin/view/common/_container.html";i:1602393978;}*/ ?>
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
<input type="hidden" name='member_role_id' id='member_role_id' value="<?php echo $info['member_role_id']; ?>" />
	<div class="ibox-content">
		<div class="form-horizontal" id="CodeInfoForm">
			<div class="row">
				<div class="col-sm-12">
				<!-- form start -->
					<div class="form-group">
						<label class="col-sm-2 control-label">角色名：</label>
						<div class="col-sm-9">
							<input type="text" autocomplete="off" id="role_name" value="<?php echo $info['role_name']; ?>" name="role_name" class="form-control" placeholder="请输入角色名">
						</div>
					</div>
					<div class="form-group layui-form">
						<label class="col-sm-2 control-label">状态：</label>
						<div class="col-sm-9">
							<?php if(!isset($info['status'])){ $info['status'] = '2'; }; ?>
							<input name="status" value="1" type="radio" <?php if($info['status'] == '1'): ?>checked<?php endif; ?> title="启动">
							<input name="status" value="2" type="radio" <?php if($info['status'] == '2'): ?>checked<?php endif; ?> title="禁用">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">类型：</label>
						<div class="col-sm-9">
							<select lay-ignore name="type" class="form-control" id="type">
								<option value="">请选择</option>
								<option value="1" <?php if($info['type'] == '1'): ?>selected<?php endif; ?>>教师</option>
								<option value="2" <?php if($info['type'] == '2'): ?>selected<?php endif; ?>>管理</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">创建时间：</label>
						<div class="col-sm-9">
							<input type="text" autocomplete="off" value="<?php if($info['create_time'] != ''): ?><?php echo date('Y-m-d H:i:s',!is_numeric($info['create_time'])? strtotime($info['create_time']) : $info['create_time']); ?><?php endif; ?>" name="create_time"  placeholder="请输入创建时间" class="form-control" id="create_time">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">相关菜单：</label>
						<div class="col-sm-9">
							<select lay-ignore name="role_menu" class="form-control chosen" multiple data-placeholder='请选择相关菜单'  id="role_menu">
								<?php $_result=htmlOutList(\think\facade\Db::connect('mysql')->query('SELECT member_menu_id,menu_name,pid FROM `cd_member_menu`'),false);if($_result)$_result = formartList(explode(",","member_menu_id,pid,menu_name,menu_name"),$_result);foreach($_result as $key=>$sql):?>
									<option value="<?php echo $sql['member_menu_id']; ?>" <?php if(in_array($sql['member_menu_id'],explode(',',$info['role_menu']))): ?>selected<?php endif; ?>><?php echo $sql['menu_name']; ?></option>
								<?php endforeach?>
							</select>
						</div>
					</div>
				<!-- form end -->
				</div>
			</div>
			<div class="hr-line-dashed"></div>
			<div class="row btn-group-m-t">
				<div class="col-sm-9 col-sm-offset-1">
					<button type="button" class="btn btn-primary" onclick="CodeInfoDlg.update()" id="ensure">
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
		role_name: {
			validators: {
				notEmpty: {
					message: '角色名不能为空'
	 			},
	 		}
	 	},
		status: {
			validators: {
				notEmpty: {
					message: '状态不能为空'
	 			},
	 		}
	 	},
		type: {
			validators: {
				notEmpty: {
					message: '类型不能为空'
	 			},
	 		}
	 	},
	 }
}

CodeInfoDlg.collectData = function () {
	this.set('member_role_id').set('role_name').set('type').set('create_time').set('role_menu');
};

CodeInfoDlg.update = function () {
	 this.clearData();
	 this.collectData();
	 if (!this.validate()) {
	 	return;
	 }
	 var status = $("input[name = 'status']:checked").val();
	 var ajax = new $ax(Feng.ctxPath + "/MemberRole/update", function (data) {
	 	if ('00' === data.status) {
	 		Feng.success(data.msg,1000);
	 		window.parent.CodeGoods.table.refresh();
	 		CodeInfoDlg.close();
	 	} else {
	 		Feng.error(data.msg + "！",1000);
		 }
	 })
	 ajax.set('status',status);
	 ajax.set(this.CodeInfoData);
	 ajax.start();
};


</script>
<script src="/static/js/base.js" charset="utf-8"></script>

</div>
<script src="/static/js/content.js?v=1.0.0"></script>

</body>
</html>
