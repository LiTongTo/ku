<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>新闻添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>新闻添加</h2></center><a href="{{url('/news/index')}}" class="btn btn-default">列表</a><hr>
<form class="form-horizontal" role="form" action="{{url('/news/store')}}" method='post'  enctype="multipart/form-data">
   @csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">新闻标题</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name='news_name'
				   placeholder="请输新闻标题...">
                   <b style='color:red'>{{$errors->first('news_name')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">新闻分类</label>
		<div class="col-sm-8">
			<select type="password" class="form-control" id="lastname" name='cate_id'>
			   <option value="">请选择</option>
			    @foreach($cInfo as $v)
			   <option value="{{$v->cate_id}}">{{$v->cate_name}}</option>
			   @endforeach
			</select>
               <b style='color:red'>{{$errors->first('cate_id')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">新闻图片</label>
		<div class="col-sm-8">
			<input type="file" class="form-control" id="firstname" name='news_img'
				   placeholder="请输新闻图片...">
                   <b style='color:red'>{{$errors->first('news_img')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">新闻简介</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name='news_intro'
				   placeholder="请输新闻简介...">
                   <b style='color:red'>{{$errors->first('news_intro')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">新闻内容</label>
		<div class="col-sm-8">
			<textarea type="text" class="form-control" id="firstname" name='news_content'>
			 </textarea>
                   <b style='color:red'>{{$errors->first('news_content')}}</b>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">添加</button>
		</div>
	</div>
</form>

</body>
</html>