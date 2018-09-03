@include("common")
    <!-- sidebar end -->
    <!-- content start -->
    <div class="layui-body" style="padding: 15px;">
        <fieldset class="layui-elem-field layui-field-title">
            <legend>地区信息</legend>
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
                <col width="200">
                <col>
            </colgroup>
            <thead>
            <tr>
                <th>ID</th>
                <th>名称</th>
                <th>发布数目</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($area as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->area_name}}</td>
                <td>{{$item->items()->count()}}</td>
                <td><a href="/admin/area/{{$item->id}}/edit" class="layui-btn  layui-btn-normal">编辑</a> <a href="/admin/area/{{$item->id}}/delete" class="layui-btn layui-btn-danger">删除</a></td>

            </tr>
           @endforeach
            </tbody>
        </table>
        <?php if($area instanceof \Illuminate\Support\Collection){
            echo $area->links();
        }?>
    </div>
    <!-- content end -->
    <div class="layui-footer">
        © 华南农业大学 共享雨伞创作组
    </div>
</div>
</body>
</html>