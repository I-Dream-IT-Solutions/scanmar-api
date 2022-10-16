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
Route::group(['prefix' => '/otp-email'], function () {
  Route::any('/request-otp','OTPEmailController@requestOTP');
  Route::post('/verify-otp','OTPEmailController@verifyOTP');
});

Route::group(['prefix' => '/otp-sms'], function () {
  Route::post('/request-otp','OTPSMSController@requestOTP');
  Route::post('/verify-otp','OTPSMSController@verifyOTP');
});

Route::post('logout', 'UserController@logout');
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth.apikey'], function () {
  Route::post('login', 'UserController@login');
  Route::post('register', 'UserController@register');
});


Route::get('/crew-doc/export/{id}','CrewDocController@export');

Route::get('/image','ProfileController@viewImage');
Route::group(['middleware' => 'auth:api'], function () {

  Route::get('user/profile', 'UserController@myProfile');
  Route::get('user/me', 'UserController@me');

  Route::post('user/change-password', 'UserController@changePassword');


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

  Route::group(['prefix' => '/master-group'], function () {
    Route::get('/','MasterGroupController@index');
  });

  Route::group(['prefix' => '/master-position'], function () {
    Route::get('/','MasterPositionController@index');
  });

  Route::group(['prefix' => '/master-agency'], function () {
    Route::get('/','MasterAgencyController@index');
  });

  Route::group(['prefix' => '/master-principal'], function () {
    Route::get('/','MasterPrincipalController@index');
  });

  Route::group(['prefix' => '/payroll'], function () {
    Route::get('/','PayrollController@index');
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

  Route::group(['prefix' => '/notification'], function () {
    Route::get('/','NotificationController@index');
    Route::get('/unread','NotificationController@countUnread');
  });


  Route::group(['prefix' => '/crew-contact'], function () {
    Route::get('/','CrewContactController@index');
    Route::get('/{id}','CrewContactController@show');
    Route::post('/','CrewContactController@store');
    Route::post('/{id}','CrewContactController@update');
    Route::delete('/{id}','CrewContactController@destroy');
  });

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

  Route::group(['prefix' => '/supplier'], function () {
    Route::get('/','SupplierController@index');
  });

  Route::group(['prefix' => '/schedule'], function () {
    Route::get('/','ScheduleController@index');
    Route::get('/{schedule_id}','ScheduleController@show');
    Route::post('/','ScheduleController@store');
    Route::post('/{schedule_id}','ScheduleController@update');
    Route::delete('/{schedule_id}','ScheduleController@destroy');
  });

  Route::group(['prefix' => '/schedule-status'], function () {
    Route::get('/','ScheduleStatusController@index');
  });

});
