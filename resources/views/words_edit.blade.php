@include("common")
<!-- sidebar end -->
<!-- content start -->
<div class="layui-body" style="padding: 15px;">
    <fieldset class="layui-elem-field layui-field-title">
        <legend>关键词屏蔽</legend>
    </fieldset>

    <?php
    if (isset($info)){
        ?>
    <blockquote class="layui-elem-quote">{{$info}}</blockquote>
    <?php } ?>
    <form class="layui-form" action="/admin/item/words" method="post">
        {{ csrf_field() }}
        <blockquote class="layui-elem-quote">请输入需要屏蔽的关键词，采用英文逗号隔开</blockquote>

        <div class="">
            <textarea name="content" rows="15" placeholder="请输入内容" class="layui-textarea">{{$content}}</textarea>
        </div>

        <div style="margin-top: 20px" class="layui-form-item">
            <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
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