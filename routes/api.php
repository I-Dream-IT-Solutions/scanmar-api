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


Route::post('logout', 'UserController@logout');
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth.apikey'], function () {
  Route::post('login', 'UserController@login');

});
Route::group(['middleware' => 'auth:api'], function () {

  Route::get('user/profile', 'UserController@myProfile');
  Route::get('user/me', 'UserController@me');


  Route::group(['prefix' => '/education'], function () {
    Route::get('/','EducationController@index');
    Route::get('/{id}','EducationController@show');
    Route::post('/','EducationController@store');
    Route::post('/{id}','EducationController@update');
    Route::delete('/{id}','EducationController@destroy');
  });

});
