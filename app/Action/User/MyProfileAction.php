<?php

namespace App\Action\User;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
use App\Models\CrewProfile;

class MyProfileAction
{

  public function execute($request)
  {
    $user = Auth::user();
    $profile = CrewProfile::where('id',$user->crew_profile_id)->with(['barangay','province','city','prov_barangay','prov_province','prov_city'])->first();

    $birthDate = $profile->date_of_birth;
    $currentDate = date("d-m-Y");

    $metadata = str_replace('\\','',$profile->metadata);
    $metadata = json_decode($metadata,true);

    if(is_array($metadata))
    $profile->fill($metadata);

    $age = date_diff(date_create($birthDate), date_create($currentDate));

    $personal = [
      'id'=> $profile->crew_no,
      'photo'=> $profile->photo,
      'firstName'=> $profile->first_name,
      'middleName'=> $profile->middle_name,
      'lastName'=> $profile->last_name,
      'group'=> $profile->groupx,
      'gender'=> $profile->gender,
      'civilStatus'=> $profile->civil_status,
      'age'=> $age->y,
      'birthday'=> $profile->date_of_birth,
      'placeOfBirth'=> $profile->place_of_birth,
      'nationality'=> $profile->nationality,
      'religion'=> $profile->religion,
      'height'=> $profile->height,
      'weight'=> $profile->weight,
      'footSize'=> $profile->footsize,
      'eyesColor'=> $profile->eyes_color,
      'dismark'=> $profile->dismark,
      'bloodType'=> $profile->bloodtype,
      'waistline'=> $profile->waistline,
      'parka'=> $profile->parka,
      'coverAll'=> $profile->coverall,
      'foreignId'=> $profile->foreignid,
      'sss'=> $profile->sss,
      'tin'=> $profile->tin,
      'pagibig'=> $profile->pagibig,
      'philhealth'=> $profile->phealth,
      'recommendedBy'=> $profile->recommend,
      'relation'=> $profile->relation
    ];

    $contact = [
      'mobile'=> ['095948494','095948494'],
      'email'=> ['sample@email.com','sample@email.com']
  	];

    $currentAddress= [
      'address'=> $profile->address,
      'barangayCode'=> $profile->address_barangay_code,
      'barangayName'=> $profile->barangay?$profile->barangay->brgyDesc:null,
      'cityCode'=> $profile->address_city_muni_code,
      'cityName'=> $profile->city?$profile->city->citymunDesc:null,
      'provinceCode'=> $profile->address_province_code,
      'provinceName'=> $profile->province?$profile->province->provDesc:null
    ];

    $provincialAddress= [
      'isSameWithCurrent'=> false,
      'address'=> $profile->prov_address,
      'barangayCode'=> $profile->prov_address_barangay_code,
      'barangayName'=> $profile->prov_barangay?$profile->prov_barangay->brgyDesc:null,
      'cityCode'=> $profile->prov_address_city_muni_code,
      'cityName'=> $profile->prov_city?$profile->prov_city->citymunDesc:null,
      'provinceCode'=> $profile->prov_address_province_code,
      'provinceName'=> $profile->prov_province?$profile->prov_province->provDesc:null
    ];

    $emergencyContact= [
      'contactName'=> $profile->emerfname .' '. $profile->emermname .' '.$profile->emerlname,
      'firstName'=> $profile->emerfname,
      'middleName'=> $profile->emermname,
      'lastName'=> $profile->emerlname,
      'relation'=> $profile->emerrelat,
      'contact'=> $profile->emertel,
      'address'=> $profile->emeradd
    ];


    return ['personal'=>$personal,'contact'=>$contact,'currentAddress'=>$currentAddress,'provincialAddress'=>$provincialAddress,'emergencyContact'=>$emergencyContact];

  }



}
