@include("common")
<!-- sidebar end -->
<!-- content start -->
<div class="layui-body" style="padding: 15px;">
    <fieldset class="layui-elem-field layui-field-title">
        <legend>共享条目</legend>
    </fieldset>
    <?php
    if (isset($_COOKIE['info'])){
    ?>
    <blockquote class="layui-elem-quote">{{\Illuminate\Support\Facades\Cookie::get('info')}}</blockquote>
    <?php
    \Illuminate\Support\Facades\Cookie::queue(\Illuminate\Support\Facades\Cookie::forget('info'));
    } ?>

    <table class="layui-table">
        <colgroup>
            <col width="50">
            <col>
        </colgroup>
        <thead>
        <tr>
            <th>ID</th>
            <th>标题</th>
            <th>地区</th>
            <th>用户</th>
            <th>标签</th>
            <th>日期</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->title}}</td>
                <td>{{\App\Area::find($item->area_id)->area_name}}</td>
                <td>{{\App\User::find($item->user_id)->username}}</td>
                <td>{{$item->tags}}</td>
                <td>{{$item->created_at}}</td>

                <td><a href="/admin/item/{{$item->id}}/edit" class="layui-btn  layui-btn-normal">编辑</a> <a href="/admin/item/{{$item->id}}/delete" class="layui-btn layui-btn-danger">删除</a></td>

            </tr>
        @endforeach
        </tbody>
    </table>
    <?php if($item instanceof \Illuminate\Support\Collection){
        echo $item->links();
    }?>
</div>
<!-- content end -->
<div class="layui-footer">
    © 华南农业大学 共享雨伞创作组
</div>
</div>
</body>
</html>