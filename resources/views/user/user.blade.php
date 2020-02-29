<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bootstrap 实例 - 水平表单</title>
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static//js/bootstrap.min.js"></script>
</head>
<body>

<form class="form-horizontal" role="form" action="{{url('/user_insert')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">管理员名称：</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" name="uname" id="firstname" placeholder="请输入管理员名称">
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">密码：</label>
        <div class="col-sm-2">
            <input type="password" class="form-control" name="upwd" id="lastname" placeholder="请输入密码">
        </div>
    </div>

    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">是否是库管主管：</label>
        <div class="col-sm-2">
            <input type="radio" id="lastname" name="uiduntity" value="1">是
            <input type="radio" id="lastname" name="uiduntity" value="2" checked>否
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">登录</button>
        </div>
    </div>
</form>

</body>
</html>