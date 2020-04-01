<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Admin;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('log.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dump(123);
        $data=request()->except('_token');
        // dd($data);
        $Na=Admin::where('admin_name',$data['admin_name'])->first();
        if(!$Na){
            return redirect('/log/create')->with('msg','用户或密码错误');
        }

        $de=decrypt($Na['admin_pwd']);
       
        if($de!=$data['admin_pwd']){
             return redirect('/log/create')->with('msg','用户或密码错误');
        }else{
            request()->session()->put('admin',$Na['admin_name']);
            return redirect('/news/create');
        }
        
        

        // if(($data['admin_name']==$Na['admin_name']&&$data['admin_pwd']==$Na['admin_pwd'])){
        //      request()->session()->put('admin',$Na);
        //      return redirect('/news/create');
        // }
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
}
