<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>注册</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>注册系统</h2></center><a href="{{url('/log/create')}}"><button type="submit" class="btn btn-default">登录</button></a><hr>
<form class="form-horizontal" role="form" action="{{url('/admin/store')}}" method='post'>
   @csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">名字</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name='admin_name'
				   placeholder="请输入名字">
                   <b style='color:red'>{{$errors->first('admin_name')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">密码</label>
		<div class="col-sm-8">
			<input type="password" class="form-control" id="lastname" name='admin_pwd'
				   placeholder="请输密码">
                   <b style='color:red'>{{$errors->first('admin_pwd')}}</b>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">注册</button>
		</div>
	</div>
</form>

</body>
</html>