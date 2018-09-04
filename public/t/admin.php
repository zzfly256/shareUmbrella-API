<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台管理系统</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- echart -->
	<script src="https://cdn.bootcss.com/echarts/4.1.0.rc2/echarts.min.js"></script>
	<!-- jquery 3 -->
	<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
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
			<blockquote class="layui-elem-quote layui-anim layui-anim-upbit">
				<span>
					<h2>
						今天是
						<script type="text/javascript">
							var date = new Date()
							var str = ''
							str += date.getFullYear()+'年'
							str += date.getMonth()+1+'月'
							str += date.getDate ()+'日'
							document.write(str)
						</script>，
						<script type="text/javascript">
							var date = new Date()
							var hour = date.getHours()
							if (hour < 6 || hour >= 18) document.write('晚安')
							if (hour >= 6 && hour <= 12) document.write('早上好')
							else if (hour > 12 && hour < 18) document.write('下午好')
							</script>
						世界。
					</h2>
				</span>
			</blockquote>
			<!-- some statistic data -->
			<div class="layui-row">
				<div class="layui-col-sm5">
					<fieldset class="layui-elem-field layui-field-title">
						<legend>用户总数</legend>
						<div style="margin: 2vw;">
							<i class="layui-icon layui-icon-username" style="font-size: 5vh;"></i>
							<span style="font-size: 5vh; padding: 15px;">
								<!--Get total users -->
								<script type="text/javascript">
									var xmlhttp
									var url = "http://134.175.49.230:8000/api/item" //url need to be added 
									//code for IE7+, Firefox, Chrome, Opera, Safari
									if (window.XMLHttpRequest) {
										xmlhttp = new XMLHttpRequest()
									} 
									//code for IE7
									else {
										xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
									}
									if(xmlhttp) {
										xmlhttp.open("GET",url,true)
										xmlhttp.send()
									}
									document.write(3)
									//document.write(xmlhttp.responseText)
								</script> 人
							</span>
						</div>
					</fieldset>
				</div>
				<div class="layui-col-sm5 layui-col-sm-offset2">
					<fieldset class="layui-elem-field layui-field-title">
						<legend>运行时间</legend>
						<div style="margin: 2vw;">
							<i class="layui-icon layui-icon-website" style="font-size: 5vh;"></i>
							<span style="font-size: 5vh; padding: 15px;">
								<script type="text/javascript">
									var start = new Date(2018,7,8).getTime()
									var now = new Date().getTime()
									var time = Math.floor((now - start)/1000/3600/24)
									document.write(time)
								</script> 天
							</span>
						</div>
					</fieldset>
				</div>
			</div>
			<!-- some chart -->
			<div class="layui-row">
				<div class="layui-col-sm5 layui-sm-offset1">
					<fieldset class="layui-elem-field layui-field-title">
						<legend>用户趋势</legend>
						<div id="trend" style="width: 400px;height: 400px;padding: 60px;"></div>
						<script type="text/javascript">
							var today = (new Date()).getDate()
					        var myChart = echarts.init(document.getElementById('trend'));
					        var option = {
					            title: {
					                text: '人数变化'
					            },
					            tooltip: {},
					            legend: {
					                data:['人数']
					            },
					            xAxis: {
					                data: [String(today-2),String(today-1),String(today),String(today+1),String(today+2)]
					            },
					            yAxis: {},
					            series: [{
					                name: '人数',
					                type: 'bar',
					                data: [1,2,3,4,5]
					            }]
					        };
					        myChart.setOption(option);
					    </script>
					</fieldset>
				</div>
			</div>
		</div>
		<fieldset class="layui-elem-field layui-field-title">
			<legend>用户趋势</legend>
		</fieldset>	
		<!-- content end -->
		<div class="layui-footer">
			© 华南农业大学 共享雨伞创作组
		</div>
	</div>
</body>
</html>