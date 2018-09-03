@include("common")
    <!-- sidebar end -->
    <!-- content start -->
    <div class="layui-body" style="padding: 15px;">
        <fieldset class="layui-elem-field layui-field-title">
            <legend>用户信息</legend>
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
                <th>姓名</th>
                <th>昵称</th>
                <th>性别</th>
                <th>微信</th>
                <th>专业</th>
                <th>注册时间</th>
                <th>发布数目</th>
                <th>权限</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($user as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->username}}</td>
                <td>{{$item->usernick}}</td>
                <td>{{$item->usersex}}</td>
                <td>{{$item->wechat}}</td>
                <td>{{$item->marjor}}</td>
                <td>{{\Carbon\Carbon::parse($item->created_at)->toDateString()}}</td>
                <td>{{$item->items()->count()}}</td>
                <td><?php if($item->level=="1"){echo "管理员";}else{echo "普通用户";}?></td>
                <td><a href="/admin/user/{{$item->id}}/edit" class="layui-btn  layui-btn-normal">编辑</a>
                    <?php if(empty($item->deleted_at)){?>
                    <a href="/admin/user/{{$item->id}}/delete" class="layui-btn layui-btn-danger">封禁</a></td>
                    <?php }else{?>
                    <a href="/admin/user/{{$item->id}}/recovery" class="layui-btn layui-btn-danger">解封</a></td>
                    <?php }?>

            </tr>
           @endforeach
            </tbody>
        </table>
        <?php if($user instanceof \Illuminate\Support\Collection){
            echo $user->links();
        }?>

    </div>
    <!-- content end -->
    <div class="layui-footer">
        © 华南农业大学 共享雨伞创作组
    </div>
</div>
</body>
</html>