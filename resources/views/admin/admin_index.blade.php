<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bootstrap 实例 - 水平表单</title>
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>
</head>
<body>

<table class="table table-striped">
    <thead>
    <tr>
        <th>序号</th>
        <th>管理员名称</th>
        <th>管理员手机号</th>
        <th>管理员邮箱</th>
        <th>管理员头像</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    @foreach($res as $v)
        <tr>
            <td>{{$v->admin_id}}</td>
            <td>{{$v->admin_name}}</td>
            <td>{{$v->admin_tel}}</td>
            <td>{{$v->admin_email}}</td>
            <td><img src="{{env('UPLOAD_URL')}}{{$v->admin_img}}" width="50" height="50"></td>
            <td>
                <a href="javascript:;" onclick="del({{$v->admin_id}})" class="btn btn-danger">删除</a>
                <a href="{{url('/admin_edit/'.$v->admin_id)}}" class="btn btn-default">编辑</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
<script>
    function del(admin_id){
        if(!admin_id){
            return;
        }
        if(confirm("是否删除")){
            $.get("/admin_destroy/"+admin_id,function(res){
                if($res="00000"){
                    location.reload();
                }
            },'json')
        }
    }
</script>