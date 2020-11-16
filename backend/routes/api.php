<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return 'helloworld';
});


Route::get('/lesson', 'Api\Auth\RegisterController@index')->name('index');
Route::group(["middleware" => "api"], function () {
    Route::post('/register', 'Api\Auth\RegisterController@register')->name('register');
    Route::post('/login', 'Api\Auth\LoginController@login')->name('login');
    Route::get('/current_admin_user', function () {
        return Auth::user();
    });
});

//追加
Route::group(['middleware' => ['auth:api']], function () {
    Route::post('/logout', 'Api\Auth\LoginController@logout')->name('logout');
    //Route::apiResource('admin_users', 'Api\AdminUserController')->except(['show']);
});
