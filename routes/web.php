<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//注册
Route::prefix('/admin')->group(function(){
    Route::get('/create','AdminController@create');
    Route::post('/store','AdminController@store');
});

//登录
Route::prefix('/log')->group(function(){
    Route::get('/create','LoginController@create');
    Route::post('/store','LoginController@store');
});

//新闻添加
Route::prefix('/news')->middleware('islog')->group(function(){
     Route::get('/create','NewsController@create');
     Route::post('/store','NewsController@store');
     Route::get('/index','NewsController@index');
     Route::get('/desc/{id}','NewsController@desc');
});
