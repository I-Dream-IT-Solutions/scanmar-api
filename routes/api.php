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


  Route::group(['prefix' => '/profile'], function () {
    Route::post('/personal-information','ProfileController@personalInformation');
    Route::post('/current-address','ProfileController@currentAddress');
    Route::post('/emergency-contact','ProfileController@emergencyContact');
  });

  Route::group(['prefix' => '/education'], function () {
    Route::get('/','EducationController@index');
    Route::get('/{id}','EducationController@show');
    Route::post('/','EducationController@store');
    Route::post('/{id}','EducationController@update');
    Route::delete('/{id}','EducationController@destroy');
  });

  Route::group(['prefix' => '/dependent'], function () {
    Route::get('/','DependentController@index');
    Route::get('/{id}','DependentController@show');
    Route::post('/','DependentController@store');
    Route::post('/{id}','DependentController@update');
    Route::delete('/{id}','DependentController@destroy');
  });

  Route::group(['prefix' => '/address'], function () {
    Route::get('/region','AddressController@index');
    Route::get('/province','AddressController@province');
    Route::get('/city','AddressController@city');
    Route::get('/barangay','AddressController@barangay');
  });

});
