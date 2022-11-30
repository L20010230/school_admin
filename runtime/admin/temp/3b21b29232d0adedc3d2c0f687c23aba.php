<?php /*a:2:{s:76:"/www/wwwroot/senior.test.jiayuanxueyuan.cn/app/admin/view/member/update.html";i:1669691416;s:80:"/www/wwwroot/senior.test.jiayuanxueyuan.cn/app/admin/view/common/_container.html";i:1602393978;}*/ ?>
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
<input type="hidden" name='member_id' id='member_id' value="<?php echo $info['member_id']; ?>" />
	<div class="ibox-content">
		<div class="form-horizontal" id="CodeInfoForm">
			<div class="row">
				<div class="col-sm-12">
				<!-- form start -->
					<div class="form-group">
						<label class="col-sm-2 control-label">姓名：</label>
						<div class="col-sm-9">
							<input type="text" autocomplete="off" id="name" value="<?php echo $info['name']; ?>" name="name" class="form-control" placeholder="请输入姓名">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">账号：</label>
						<div class="col-sm-9">
							<input type="text" autocomplete="off" id="user_name" value="<?php echo $info['user_name']; ?>" name="user_name" class="form-control" placeholder="请输入账号">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">密码：</label>
						<div class="col-sm-9">
							<input type="password" id="password" value="<?php echo $info['password']; ?>" name="password" class="form-control" placeholder="请输入密码">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">手机号：</label>
						<div class="col-sm-9">
							<input type="text" autocomplete="off" id="mobile" value="<?php echo $info['mobile']; ?>" name="mobile" class="form-control" placeholder="请输入手机号">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">角色：</label>
						<div class="col-sm-9">
							<select lay-ignore name="role" class="form-control" id="role">
								<option value="">请选择</option>
								<?php $_result=htmlOutList(\think\facade\Db::connect('mysql')->query('SELECT member_role_id,role_name FROM `cd_member_role`'),false);if($_result)foreach($_result as $key=>$sql):?>
									<option value="<?php echo $sql['member_role_id']; ?>" <?php if($info['role'] == $sql['member_role_id']): ?>selected<?php endif; ?>><?php echo $sql['role_name']; ?></option>
								<?php endforeach?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">创建时间：</label>
						<div class="col-sm-9">
							<input type="text" autocomplete="off" value="<?php if($info['create_time'] != ''): ?><?php echo date('Y-m-d H:i:s',!is_numeric($info['create_time'])? strtotime($info['create_time']) : $info['create_time']); ?><?php endif; ?>" name="create_time"  placeholder="请输入创建时间" class="form-control" id="create_time">
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
<script>
layui.use(['form'],function(){});
laydate.render({elem: '#create_time',type: 'datetime',trigger:'click'});
var CodeInfoDlg = {
	CodeInfoData: {},
	validateFields: {
		name: {
			validators: {
				notEmpty: {
					message: '姓名不能为空'
	 			},
	 		}
	 	},
		user_name: {
			validators: {
				notEmpty: {
					message: '账号不能为空'
	 			},
	 		}
	 	},
		password: {
			validators: {
				notEmpty: {
					message: '密码不能为空'
	 			},
	 		}
	 	},
		mobile: {
			validators: {
				notEmpty: {
					message: '手机号不能为空'
	 			},
				regexp: {
					regexp: /^1[3456789]\d{9}$/,
					message: ''
	 			},
	 		}
	 	},
	 }
}

CodeInfoDlg.collectData = function () {
	this.set('member_id').set('name').set('user_name').set('password').set('mobile').set('role').set('create_time');
};

CodeInfoDlg.update = function () {
	 this.clearData();
	 this.collectData();
	 if (!this.validate()) {
	 	return;
	 }
	 var ajax = new $ax(Feng.ctxPath + "/Member/update", function (data) {
	 	if ('00' === data.status) {
	 		Feng.success(data.msg,1000);
	 		window.parent.CodeGoods.table.refresh();
	 		CodeInfoDlg.close();
	 	} else {
	 		Feng.error(data.msg + "！",1000);
		 }
	 })
	 ajax.set(this.CodeInfoData);
	 ajax.start();
};


</script>
<script src="/static/js/base.js" charset="utf-8"></script>

</div>
<script src="/static/js/content.js?v=1.0.0"></script>

</body>
</html>
