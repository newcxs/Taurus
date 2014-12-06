<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function (){
    return Redirect::to('/index');
});

Route::get('/email/{code}', function ($code){
    $res = Verify::doVerify($code);
    if($res) return BaseController::showMsg('邮箱验证成功', URL::to('/index'));
    else return BaseController::showMsg('邮箱验证失败，请重试', URL::to('/index'));
});

Route::get('/index', 'HomeController@getIndex');

Route::get('/about', 'HomeController@getAbout');

Route::controller('/member', 'MemberController');

Route::controller('/dashboard', 'DashboardController');

Route::controller('/service', 'ServiceController');
