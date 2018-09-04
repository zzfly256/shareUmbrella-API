@include("common")
<!-- sidebar end -->
<!-- content start -->
<div class="layui-body" style="padding: 15px;">
    <fieldset class="layui-elem-field layui-field-title">
        <legend>共享条目信息</legend>
    </fieldset>

    <?php
    if (isset($info)){
        ?>
    <blockquote class="layui-elem-quote">{{$info}}</blockquote>
    <?php } ?>
    <form class="layui-form" action="/admin/item/{{$item->id}}/edit" method="post">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="layui-form-item">
            <label class="layui-form-label">ID</label>
            <div class="layui-input-block">
                <input type="text" name="id" required  lay-verify="required" placeholder="请输入ID" autocomplete="off" class="layui-input" disabled value="{{$item->id}}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">标题</label>
            <div class="layui-input-block">
                <input type="text" name="title" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" value="{{$item->title}}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">内容</label>
            <div class="layui-input-block">
                <textarea name="content" placeholder="请输入内容" class="layui-textarea">{{$item->content}}</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">用户</label>
            <div class="layui-input-block">
                <input type="text" name="user" required  lay-verify="required" autocomplete="off" class="layui-input" value="{{\App\User::find($item->user_id)->username}}" disabled>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">地区</label>
            <div class="layui-input-block">
                <input type="text" name="area" required  lay-verify="required" autocomplete="off" class="layui-input" value="{{\App\Area::find($item->area_id)->area_name}}" disabled>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">标签</label>
            <div class="layui-input-block">
                <input type="text" name="tags" required  lay-verify="required" autocomplete="off" class="layui-input" value="{{$item->tags}}" disabled>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">经纬度</label>
            <div class="layui-input-block">
                <input type="text" name="coordinate" required  lay-verify="required" autocomplete="off" class="layui-input" value="{{$item->coordinate}}" disabled>
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