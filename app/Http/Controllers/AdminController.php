<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Admin;
class AdminController extends Controller
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
          return view('admin.create');
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
         $data['admin_pwd']=encrypt($data['admin_pwd']);
            // dd($data);
         $validator=Validator::make($data,[
             'admin_name'=>'required|regex:/^[\x{4e00}-\x{9fa5}\w]{2,15}$/u|unique:admin',
            //  'admin_pwd'=>'required|regex:/^[\w]{6,15}$/',
         ],[
              'admin_name.required'=>'有户名不能为空',
              'admin_name.regex'=>'用户名由2-15的中文、字母、数字、下划线组成',
              'admin_name.unique'=>'该用户已存在',
            //   'admin_pwd.required'=>'密码不能为空',
            //   'admin_pwd.regex'=>'密码由6-18数字、字母、下划线组成',
         ]);

         if($validator->fails()){
                return redirect('/admin/create')
                ->withErrors($validator)
                ->withInput();
         }

        $res=Admin::create($data);
         if($res){
               return redirect('/log/create');
         }else{
             return redirect('/admin/create');
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
}
