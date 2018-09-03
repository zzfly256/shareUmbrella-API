@include("common")
<!-- sidebar end -->
<!-- content start -->
<div class="layui-body" style="padding: 15px;">
    <fieldset class="layui-elem-field layui-field-title">
        <legend>用户信息</legend>
    </fieldset>

    <?php
    if (isset($info)){
        ?>
    <blockquote class="layui-elem-quote">{{$info}}</blockquote>
    <?php } ?>
    <form class="layui-form" action="/admin/user/{{$item->id}}/edit" method="post">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="layui-form-item">
            <label class="layui-form-label">ID</label>
            <div class="layui-input-block">
                <input type="text" name="id" required  lay-verify="required" placeholder="请输入ID" autocomplete="off" class="layui-input" disabled value="{{$item->id}}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">姓名</label>
            <div class="layui-input-block">
                <input type="text" name="username" required  lay-verify="required" placeholder="请输入姓名" autocomplete="off" class="layui-input" value="{{$item->username}}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">性别</label>
            <div class="layui-input-block">
                <select name="usersex" lay-verify="required">
                    <option value="M" <?php if($item->usersex=="M"){echo "selected";}?>>男生</option>
                    <option value="W" <?php if($item->usersex=="W"){echo "selected";}?>>女生</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">昵称</label>
            <div class="layui-input-block">
                <input type="text" name="usernick" required  placeholder="请输入昵称" autocomplete="off" class="layui-input" value="{{$item->usernick}}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">专业</label>
            <div class="layui-input-block">
                <input type="text" name="marjor" placeholder="请输入专业" autocomplete="off" class="layui-input" value="{{$item->marjor}}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">微信</label>
            <div class="layui-input-block">
                <input type="text" name="wechat" placeholder="请输入微信" autocomplete="off" class="layui-input" value="{{$item->wechat}}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">QQ</label>
            <div class="layui-input-block">
                <input type="text" name="qq" placeholder="请输入QQ" autocomplete="off" class="layui-input" value="{{$item->qq}}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">电话</label>
            <div class="layui-input-block">
                <input type="text" name="phone" placeholder="请输入电话" autocomplete="off" class="layui-input" value="{{$item->phone}}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">密码</label>
            <div class="layui-input-block">
                <input type="password" name="password" autocomplete="off" class="layui-input" value="" placeholder="非修改密码请留空">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">权限</label>
            <div class="layui-input-block">
                <select name="level" lay-verify="required">
                    <option value="0" <?php if($item->level=="0"){echo "selected";}?>>普通用户</option>
                    <option value="1" <?php if($item->level=="1"){echo "selected";}?>>管理员</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>

    </form>
</div>
<!-- content end -->
<div class="layui-footer">
    © 华南农业大学 共享雨伞创作组
</div>
</div>
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
</html>