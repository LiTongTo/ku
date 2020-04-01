<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate;
use App\News;
use Validator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $res=News::leftjoin('cate','cate.cate_id','=','news.cate_id')->paginate(3);
         return view('news.index',['res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cInfo=Cate::get();
        return view('news.create',['cInfo'=>$cInfo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=request()->except('_token');
        // dd($data);
        $data['add_time']=time();
        $data['add_man']=request()->session()->get('admin');
        $validator=Validator::make($data,[
            'news_name'=>'required|unique:news',
            'cate_id'=>'required',
            'news_img'=>'required',
            'news_intro'=>'required',
            'news_content'=>'required',
        ],[
            'news_name.required'=>'新闻标题不能为空',
            'news_name.unique'=>'新闻标题已存在',
            'cate_id.required'=>'新闻分类不能为空',
            'news_img.required'=>'新闻图片不能为空',
            'news_intro.required'=>'新闻简介不能为空',
            'news_content.required'=>'新闻内容不能为空',
        ]);
        if($validator->fails()){
             return redirect('/news/create')
             ->withErrors($validator)
             ->withInput();
        }
        

         //文件上传
         if($request->hasFile('news_img')){
            $data['news_img']=$this->uploads('news_img');
             
         }
        
         
         $res=News::create($data);
         if($res){
              return redirect('/news/index');
         }else{
             return redirect('/news/create');
         }
    }

    public function uploads($img){
       $file=request()->file($img);
       if($file->isValid()){
           $store=$file->store("uploads");
           return $store;
       }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function desc($id){
        $count=Cache::add('count_'.$id,1) ? Cache::get('count_'.$id):Cache::increment('count_'.$id);
       $res=News::leftjoin('cate','cate.cate_id','=','news.cate_id')->where('news_id',$id)->first();
       return view('news.desc',['res'=>$res,'count'=>$count]);
    }
}
