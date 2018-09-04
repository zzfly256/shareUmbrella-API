<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台管理系统&gt;标签管理</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- jquery 3 -->
	<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
	<!-- bootstrap 4 -->
	<script src="https://cdn.bootcss.com/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.min.js"></script>
	<link href="https://cdn.bootcss.com/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css" rel="stylesheet">
	<!-- Layui -->
	<link rel="stylesheet" href="http://cdn.90so.net/layui/2.3.0/css/layui.css">
	<script src="http://cdn.90so.net/layui/2.3.0/layui.js"></script>
	<!-- import module "element"-->
	<script>
		layui.use('element', function(){
			var element = layui.element;
		});
	</script>

</head>
<body class="layui-layout-body">
	<div class="layui-layout layui-layout-admin">
		<!-- navbar start -->
		<div class="layui-header">
			<div class="layui-logo">管理面板</div>
			<ul class="layui-nav layui-layout-left">
				
			</ul>
			<ul class="layui-nav layui-layout-right">
				<li class="layui-nav-item">
					<a href="javascript:;">
						<img src="https://t.alipayobjects.com/images/rmsweb/T1B9hfXcdvXXXXXXXX.svg" class="layui-nav-img">
						<span>Admin</span>
					</a>
					<dl class="layui-nav-child">
						<dd><a href="">基本资料</a></dd>
					</dl>
				</li>
				<li class="layui-nav-item"><a href="">登出</a></li>
			</ul>
		</div>
		<!-- navbar end -->
		<!-- sidebar start -->
		<div class="layui-side layui-bg-black">
			<div class="layui-side-scroll">
				<ul class="layui-nav layui-nav-tree"  lay-filter="test">
					<li class="layui-nav-item layui-nav-itemed">
						<a class="" href="javascript:;">条目管理</a>
					</li>
					<li class="layui-nav-item">
						<a href="javascript:;">用户管理</a>
					</li>
					<li class="layui-nav-item">
						<a href="javascript:;">地区管理</a>
					</li>
					<li class="layui-nav-item">
						<a href="javascript:;">标签管理</a>
					</li>
				</ul>
			</div>
		</div>
		<!-- sidebar end -->
		<!-- content start -->
		<div class="layui-body" style="padding: 15px;">
			<fieldset class="layui-elem-field layui-field-title">
				<legend>标签信息</legend>
			</fieldset>
			<!-- tool bar start -->
			<div class="layui-inline" style="padding: 15px;">
				<button class="layui-btn" id="add">添加</button>
			</div>

			<!-- pop up page start -->
			<div class="layui-row" style="display: none;" id="add-page">
				<div class="layui-col-md10 layui-col-md-offset1">
					<div class="layui-form-item" style="padding: 15px;">
						<div class="layui-form-label">标签名:</div>
						<div class="layui-inline">
							<input type="text" name="area_name" class="layui-input">
						</div>
						<button class="layui-btn layui-inline">提交</button>
					</div>
				</div>
			</div>
			<!-- pop up page end -->
			<script type="text/javascript">
				layui.use(['table','layer'], function(){
					$('#add').on('click', function(){
					    layer.open({
					      type: 1,
					      area: ['600px', '360px'],
					      shadeClose: true, 
					      title: '添加标签',
					      content: $('#add-page').html()
					    });
					});
				});
			</script>
			<!-- tool bar end -->
			<div class="layui-row">
				<div class="layui-col-md6">
					<fieldset class="layui-elem-field layui-field-title">
						<legend class="">标签列表</legend>
						<div class="layui-row" style="padding: 15px; ">
							<input type="text" class="form-control" id="tags" value="男生,女生,五山,华山" />
							<script>
								$('#tags').tokenfield({
								})
							</script>
						</div>
					</fieldset>
				</div>
			</div>
		</div>
		<!-- content end -->
		<div class="layui-footer">
			© 华南农业大学 共享雨伞创作组
		</div>
	</div>
</body>
</html>