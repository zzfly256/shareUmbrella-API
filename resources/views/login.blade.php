<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理系统 - 登录</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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

<body style="background: #f1f1f1">

                <form class="layui-form" action="/admin/login" method="post" style="width: 400px; margin: 150px auto">
                    {{ csrf_field() }}
                                <h2 style="text-align: center;font-size: 30px;font-weight: 300;border-bottom:1px solid #ddd;padding-bottom:40px">共享雨伞管理面板</h2>
                            <input type="text" name="phone" required  lay-verify="required" placeholder="请输入手机号" autocomplete="off" class="layui-input" style="margin-top: 40px">

                            <input type="password" name="password" required  lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input"  style="margin-top: 20px">

                            <button class="layui-btn layui-btn-primary" style="width: 100%;display:block;border:0px;margin-top: 20px" lay-submit lay-filter="formDemo">立即提交</button>

                </form>

                <footer style="font-size: 12px;text-align: center;color:#aaa">
                    Copyright 共享雨伞 all rights reserved.
                </footer>

<script>
    //Demo
    layui.use('form', function(){
        var form = layui.form;

        //监听提交
        form.on('submit(formDemo)', function(data){
            $('form').submit();
        });
    });
</script>
</body>