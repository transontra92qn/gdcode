<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','HomeController@index');
Route::get('dang-ki-tai-khoan','HomeController@Register');
Route::post('doregister','HomeController@DoRegister');
Route::get('login','HomeController@Login');
Route::post('login','HomeController@LoginAuth');
Route::get('logout','HomeController@logout');
Route::get('thong-tin-ca-nhan','HomeController@UserProfile');
Route::post('changeprofile','HomeController@ExUserProfile');
Route::post('checkmail','HomeController@checkmail');
Route::get('changepass','HomeController@changepass');
Route::post('changepass','HomeController@dochangepass');
Route::post('checkpassword','HomeController@checkpassword');
Route::get('codetailen','HomeController@codetailen');
Route::get('thanh-vien-upload','HomeController@upload');
Route::post('tv-upload','HomeController@tvupload');
Route::post('checktitle', 'HomeController@checknewtitle');
Route::post('checktitleupdate', 'HomeController@checktitleupdate');
Route::post('uploadfile','HomeController@uploadfile');
Route::post('editfile','HomeController@editsource');
Route::get('source-code-{id}-{anhdaidien}','HomeController@sourcecode');

Route::get('sua-code-{id}','HomeController@editfile');

Route::get('admin/login','AdminController@Login');
Route::post('admin/login','AdminController@LoginAuth');
Route::get('admin/','AdminController@index');
Route::get('admin/delete-{id}','AdminController@delete');
Route::get('admin/duyet-{id}','AdminController@duyet');
Route::get('admin/detail-{id}','AdminController@detail');
Route::post('admin/detail{id}','AdminController@postdetail');
Route::get('admin/logout','AdminController@Logout');
Route::get('admin/user/danhsach','AdminController@listuser');
Route::get('admin/user/sua-{id}','AdminController@edituser');
Route::post('xetquyen','AdminController@xetquyen1');
Route::get('admin/user/xoa-{id}','AdminController@deleteuser');
Route::get('admin/comment/danhsach','AdminController@comment');
Route::get('admin/comment/blchuaduyet','AdminController@blchuaduyet');
Route::get('admin/comment/duyet-{id}','AdminController@duyetcmt');
Route::get('admin/comment/xoa-{id}','AdminController@deletecmt');
Route::get('admin/source/danhsach','AdminController@sourceds');




Route::get('search','HomeController@search');
Route::get('code-chat-luong.html','HomeController@codechatluong');
Route::get('code-tham-khao.html','HomeController@codethamkhao');
Route::get('code-mien-phi.html','HomeController@codemienphi');
Route::get('ngon-ngu-lap-trinh','HomeController@ngonngu');
Route::get('download-{id}','HomeController@download');
Route::post('comment','HomeController@commentdt');
Route::get('code-download.htm','HomeController@codedownload');




