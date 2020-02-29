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

<form class="form-horizontal" role="form" action="{{url('/admin_update/'.$res->admin_id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">管理员名称：</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="admin_name" value="{{$res->admin_name}}" name="admin_name" placeholder="请输入管理员名称">
            <b style="color: red"></b>
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">管理员手机号：</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="admin_tel" value="{{$res->admin_tel}}" name="admin_tel" placeholder="请输入管理员手机号">
            <b style="color: red"></b>
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">管理员邮箱：</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="admin_email" value="{{$res->admin_email}}" name="admin_email" placeholder="请输入管理员邮箱">
            <b style="color: red"></b>
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">管理员头像：</label>
        <div class="col-sm-3">
            <input type="file" name="admin_img">
            <img src="{{env('UPLOAD_URL')}}{{$res->admin_img}}" width="50" height="50">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">编辑</button>
        </div>
    </div>
</form>
</body>
</html>
<script>
    $(function(){
        $(document).on("blur","#admin_name",function(){
            $(this).next().html("");
            var admin_name = $(this).val();
            if(!admin_name){
                $("#admin_name").next().html("管理员名称不能为空");
            }
        });

        $(document).on("blur","#admin_tel",function(){
            $(this).next().html("");
            var admin_tel = $(this).val();
            if(!admin_tel){
                $("#admin_tel").next().html("管理员手机号不能为空");
            }
        });

        $(document).on("blur","#admin_email",function(){
            $(this).next().html("");
            var admin_email = $(this).val();
            if(!admin_email){
                $("#admin_email").next().html("管理员邮箱不能为空");
            }
        });
    });
</script>