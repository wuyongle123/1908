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

//Route::get('/', function () {
//    return view('welcome');
//});

//前台首页
Route::view('/','index.index');
//前台登录
Route::get('/login','Index\LoginController@login');
//前台登录数据
Route::post('/login_do','Index\LoginController@login_do');
//前台注册视图
Route::get('/register','Index\RegisterController@register');
//前台注册ajax验证码
Route::post('/ajaxSms','Index\RegisterController@ajaxSms');
//前台注册验证码
Route::get('/sendSms','Index\RegisterController@sendSms');
//前台注册数据
Route::post('/reg_index','Index\RegisterController@reg_index');









//商品详情
Route::get('/proinfo/{g_id}','Index_Goods\GoodsController@proinfo');
//商品列表展示
Route::get('/prolist','Index_Goods\GoodsController@prolist');



































////分类添加视图
//Route::get('/create',('CateController@create'));
////分类添加数据
//Route::post('/store',('CateController@store'));
////分类列表
//Route::get('/index',('CateController@index'));
////分类删除
//Route::get('/destroy_del/{c_id}',('CateController@destroy_del'));
////分类修改页面
//Route::get('/cate_edit/{c_id}',('CateController@cate_edit'));
////分类修改数据
//Route::post('/cate_update/{c_id}',('CateController@cate_update'));
////分类添加js验证
//Route::post('/jscate',('CateController@jscate'));




//商品登录视图
//Route::view('/login',('login'));
//商品登录数据
//Route::post('/logindo',('LoginController@logindo'));
//商品添加视图
//Route::get('/goods_create',('GoodsController@goods_create'))->middleware("login");
////商品添加视图
//Route::post('/goods_store',('GoodsController@goods_store'))->middleware("login");
////商品展示
//Route::get('/goods_index',('GoodsController@goods_index'))->middleware("login");
////商品删除
//Route::get('/goods_destroy/{g_id}',('GoodsController@goods_destroy'))->middleware("login");
////商品修改页面
//Route::get('/goods_edit/{g_id}',('GoodsController@goods_edit'))->middleware("login");
////商品修改数据
//Route::post('/goods_update/{g_id}',('GoodsController@goods_update'))->middleware("login");




////管理员的注册视图
//Route::get('/admin_create',('AdminController@admin_create'));
////管理员的注册数据
//Route::post('/admin_store',('AdminController@admin_store'));
////管理员的展示
//Route::get('/admin_index',('AdminController@admin_index'));
////管理员删除
//Route::get('/admin_destroy/{admin_id}',('AdminController@admin_destroy'));
////管理员修改视图页面
//Route::get('/admin_edit/{admin_id}',('AdminController@admin_edit'));
////管理员修改数据
//Route::post('/admin_update/{admin_id}',('AdminController@admin_update'));








//库管理员
Route::get('/_user','UserController@_user');
//库管理员登录数据
Route::post('/user_insert','UserController@user_insert');
//库管列表
Route::get('/user_list','UserController@user_list');
//库管查看
Route::get('/user_list_/{uid}',('UserController@user_list_'));
//库管删除
Route::get('/user_del/{uid}',('UserController@user_del'));


