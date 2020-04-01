<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware(['jwt.verify'])->group(function(){
//     Route::get('user', 'UserController@getAuthenticatedUser'); 
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware(['jwt.verify'])->group(function(){
    Route::get('user', 'UserController@getAuthenticatedUser');

    //daily scrum
    Route::get('/daily', 'DailyController@index');
    Route::get('/daily/{id}', 'DailyController@show');
    Route::post('/daily', 'DailyController@store');
    Route::put('/daily/{id}', 'DailyController@update');
    Route::delete('/daily/{id}', 'DailyController@destroy');

});

