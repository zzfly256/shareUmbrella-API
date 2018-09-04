<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理系统</title>
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
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <!-- navbar start -->
    <div class="layui-header">
        <div class="layui-logo" style="color:#f1f1f1;">共享雨伞管理面板</div>
        <ul class="layui-nav layui-layout-left">

        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="https://t.alipayobjects.com/images/rmsweb/T1B9hfXcdvXXXXXXXX.svg" class="layui-nav-img">
                    <span>{{\Illuminate\Support\Facades\Auth::user()->username}}</span>
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="/admin/user/{{\Illuminate\Support\Facades\Auth::user()->id}}/edit">基本资料</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="/admin/logout">登出</a></li>
        </ul>
    </div>
    <!-- navbar end -->
    <!-- sidebar start -->
    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">条目管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/admin/item">条目列表</a></dd>
                        <dd><a href="/admin/item/words">关键词过滤</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item layui-nav-itemed">
                    <a href="javascript:;">用户管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/admin/user">用户列表</a></dd>
                        <dd><a href="/admin/user/rank">活跃排行</a></dd>
                        <dd><a href="/admin/user/block">封禁列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item layui-nav-itemed">
                    <a href="javascript:;">地区管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="/admin/area">地区列表</a></dd>
                        <dd><a href="/admin/area/add">新增地区</a></dd>
                        <dd><a href="/admin/area/rank">热度排行</a></dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>