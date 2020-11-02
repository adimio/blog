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

Route::match(['post','get'],'/test/send','TestController@email')->name('send');

Route::match(['post','get'],'/test/ue','UEController@ue')->name('u.editor');

Route::get('/test/view/1',function(){
    return view('email.emailContent');
});
Route::get('/test/view/2',function(){
    return view('email.emailSend');
});


//Auth::routes();
Auth::routes(['verify' => true]);//注册验证路由
Route::get('/home', 'HomeController@index')->name('home');
