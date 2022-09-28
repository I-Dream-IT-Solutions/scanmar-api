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
Route::group(['prefix' => '/certificate-request'], function () {
  Route::get('/','CertificateRequestController@index');
  Route::get('/{id}','CertificateRequestController@show');
  Route::post('/','CertificateRequestController@store');
  Route::post('/{id}','CertificateRequestController@update');
  Route::delete('/{id}','CertificateRequestController@destroy');
}); 

Route::group(['prefix' => '/master-certificate-type'], function () {
  Route::get('/','MasterCertificateTypeController@index');
});

Route::group(['prefix' => '/crew-doc'], function () {
  Route::get('/','CrewDocController@index');
  Route::get('/{id}','CrewDocController@show');
  Route::post('/','CrewDocController@store');
  Route::post('/{id}','CrewDocController@update');
  Route::delete('/{id}','CrewDocController@destroy');
}); 

Route::group(['prefix' => '/master-document-type'], function () {
  Route::get('/','MasterDocumentTypeController@index');
});

Route::group(['prefix' => '/doc-medical-condition'], function () {
  Route::get('/','DocMedicalConditionController@index');
  Route::get('/{id}','DocMedicalConditionController@show');
  Route::post('/','DocMedicalConditionController@store');
  Route::post('/{id}','DocMedicalConditionController@update');
  Route::delete('/{id}','DocMedicalConditionController@destroy');
}); 

Route::group(['prefix' => '/document-upload'], function () {
  Route::get('/','DocumentUploadController@index');
  Route::get('/{id}','DocumentUploadController@show');
  Route::post('/','DocumentUploadController@store');
  Route::post('/{id}','DocumentUploadController@update');
  Route::delete('/{id}','DocumentUploadController@destroy');
}); 

Route::group(['prefix' => '/document'], function () {
  Route::get('/','DocumentController@index');
  Route::get('/{id}','DocumentController@show');
  Route::post('/','DocumentController@store');
  Route::post('/{id}','DocumentController@update');
  Route::delete('/{id}','DocumentController@destroy');
}); 

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
    Route::post('/provincial-address','ProfileController@provincialAddress');
    Route::post('/emergency-contact','ProfileController@emergencyContact');
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

  Route::group(['prefix' => '/sea-service'], function () {
    Route::get('/','CrewWorkExperienceController@index');
    Route::get('/{id}','CrewWorkExperienceController@show');
    Route::post('/','CrewWorkExperienceController@store');
    Route::post('/{id}','CrewWorkExperienceController@update');
    Route::delete('/{id}','CrewWorkExperienceController@destroy');
  });

  Route::group(['prefix' => '/master-vessel'], function () {
    Route::get('/','MasterVesselController@index');
  });


  Route::group(['prefix' => '/education'], function () {
    Route::get('/','EducationController@index');
    Route::get('/{id}','EducationController@show');
    Route::post('/','EducationController@store');
    Route::post('/{id}','EducationController@update');
    Route::delete('/{id}','EducationController@destroy');
  }); 

  Route::group(['prefix' => '/master-principal'], function () {
    Route::get('/','MasterPrincipalController@index');
  });

});
