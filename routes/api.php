<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\News;

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
Route::get('getusers/', 'UserController@getUsers');
Route::post('addusers/', 'UserController@addUser');
Route::patch('/updateusers/', 'UserController@updateUser');

//___19.04.2077
Route::post('/registrvalid/','App\Http\Controllers\UsController@registrValid');
Route::post('/loginvalid/','App\Http\Controllers\UsController@loginValid');
Route::post('/logoutvalid/','App\Http\Controllers\UsController@logoutValid');
