<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>新闻列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 <center><h2>新闻列表</h2></center><a href="{{url('/news/create')}}" class="btn btn-default">添加</a><hr/> 
 
<table class="table table-condensed">
	<thead>
		<tr>
             <th>新闻ID</th>
			<th>新闻标题</th>
            <th>新闻分类</th>
			<th>新闻图片</th>
            <th>新闻简介</th>
			<th>新闻内容</th>
			
			<th>详情页</th>
		</tr>
	</thead>
	<tbody>
        @foreach($res as $v)
		<tr>
			<td>{{$v->news_id}}</td>
			<td>{{$v->news_name}}</td>
           
            <td>{{$v->cate_name}}</td>
			<td><img src="{{env('UPLOADS_URL')}}{{$v->news_img}}" width='50'></td>
			<td>{{$v->news_intro}}</td>
			<td>{{$v->news_content}}</td>
		 
			<td>
			  <a href="{{url('/news/desc/'.$v->news_id)}}">新闻详情页</a>
			</td>
		</tr>
	    @endforeach
		
	</tbody>
	
</table>
{{$res->links()}}
</body>
</html>
<script>
    $(document).on('click','.del',function(){
		// alert('123');
		var _this=$(this);
		// alert(_this);
		var art_id=_this.attr('art_id');
		//  alert(art_id);
		
		//ajax get  删除
		 if(confirm('确认删除吗？')){
            //   alert('123');
			$.get('/art/destroy/'+art_id,function(result){
                if(result.code=='00000'){
                    location.reload();
				}
			},'json')
		 }
	
	});

</script>

