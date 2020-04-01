<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新闻详情页</title>
</head>
<body>
      <h1>新闻详情页-{{$res->cate_name}}</h1>
      <p>作者：{{$res->add_man}}</p>
      <p>发布时间：@php echo date('Y-m-d H:i:s',$res->add_time) @endphp</p>
      <p>访问量{{$count}}</p>
      <p>主题内容：{{$res->news_content}}</p>
</body>
</html>