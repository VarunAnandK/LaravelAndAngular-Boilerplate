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
Route::post('Login', '\App\Http\APIController\UserController@Login');
Route::get('UserList', '\App\Http\APIController\UserController@UserList');
Route::middleware('APIToken')->group(function () {

    Route::get('UserById/{id}', '\App\Http\APIController\UserController@UserById');
    Route::post('UserUpdate', '\App\Http\APIController\UserController@UserUpdate');
    Route::post('UserInsert', '\App\Http\APIController\UserController@UserInsert');
});
