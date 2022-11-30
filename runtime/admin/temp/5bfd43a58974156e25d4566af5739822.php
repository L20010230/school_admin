<?php /*a:2:{s:91:"/www/wwwroot/senior.test.jiayuanxueyuan.cn/app/admin/controller/Sys/view/action/config.html";i:1586667216;s:80:"/www/wwwroot/senior.test.jiayuanxueyuan.cn/app/admin/view/common/_container.html";i:1602393978;}*/ ?>
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
		<table class="table table-bordered"> 
			<tbody>
				<tr> 
					<td style="background-color:#F5F5F6; font-weight:bold; text-align:left" width="15%">需要指定配置的操作名</td> 
					<td style="background-color:#F5F5F6; font-weight:bold; text-align:left" >值</td> 
					<td style="background-color:#F5F5F6; font-weight:bold; text-align:left">说明</td> 
				</tr> 
				<tr> 
					<td style="background-color:#F5F5F6; font-weight:bold; text-align:left" width="15%">修改状态 设定指定值：</td> 
					<td>10</td>  
					<td>将勾选的字段的值 设置为 10</td>
				</tr> 
				<tr> 
					<td style="background-color:#F5F5F6; font-weight:bold; text-align:left" width="15%">账号密码登录：</td> 
					<td>username|password|member_id</td>  
					<td>指定登陆的 用户名 以及 密码 并且将返回的用户id写入token</td>
				</tr> 
				<tr> 
					<td style="background-color:#F5F5F6; font-weight:bold; text-align:left" width="15%">手机号登录：</td> 
					<td>mobile|member_id</td>  
					<td>指定登陆的手机号字段 并且将返回的用户id写入token</td>
				</tr> 
				<tr> 
					<td style="background-color:#F5F5F6; font-weight:bold; text-align:left" width="15%">发送短信验证码：</td> 
					<td>Ali</td>  
					<td>则使用阿里大鱼短信平台，支持 ALi、jisu</td>
				</tr> 
				<tr> 
					<td style="background-color:#F5F5F6; font-weight:bold; text-align:left" width="15%">微信订单支付（同公众号、小程序、扫码）：</td> 
					<td>order|order_id|total_fee|status:10</td>  
					<td>指定操作的订单表 订单号 订单金额 订单状态 以及支付成功后订单状态的值</td>
				</tr> 
				<tr> 
					<td style="background-color:#F5F5F6; font-weight:bold; text-align:left" width="15%">微信充值（同公众号、小程序、扫码）：</td> 
					<td>member|member_id|amount</td>  
					<td>指定充值成功后需要操作的用户表 用户id 以及需要充值金额的字段</td>
				</tr> 
				<tr> 
					<td style="background-color:#F5F5F6; font-weight:bold; text-align:left" width="15%">小程序登陆接口：</td> 
					<td>openid</td>  
					<td>用户表存储小程序openid的字段</td>
				</tr> 
				<tr> 
					<td style="background-color:#F5F5F6; font-weight:bold; text-align:left" width="15%">公众号登陆接口：</td> 
					<td>openid</td>  
					<td>用户表存储公众号openid的字段</td>
				</tr> 
				
			</tbody> 
		</table> 
	</div> 
</div> 

</div>
<script src="/static/js/content.js?v=1.0.0"></script>

</body>
</html>
