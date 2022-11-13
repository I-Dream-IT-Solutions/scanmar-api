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
    $profile = CrewProfile::where('id',$user->crew_profile_id)->with(['barangay','province','city','prov_barangay','prov_province','prov_city','position'])->first();

    $birthDate = $profile->date_of_birth;
    $currentDate = date("d-m-Y");

    $metadata = str_replace('\\','',$profile->metadata);
    $metadata = json_decode($metadata,true);

    if(is_array($metadata))
    $profile->fill($metadata);

    $age = date_diff(date_create($birthDate), date_create($currentDate));

    $personal = [
      'id'=> $profile->crew_no??'',
      'photo'=> $profile->photo,
      'position'=> $profile->position?$profile->position->name:'',
      'group'=> $profile->groupx?$profile->groupx:'',
      'dateAvailable'=> $profile->date_available?$profile->date_available:'',
      'firstName'=> $profile->first_name,
      'middleName'=> $profile->middle_name,
      'lastName'=> $profile->last_name,
      'group'=> $profile->groupx,
      'gender'=> $profile->gender,
      'civilStatus'=> $profile->civil_status,
      'age'=> $age->y,
      'birthday'=> date('m-d-Y',strtotime($profile->date_of_birth)),
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
      'relation'=> $profile->relation,
      'metadata'=> $profile->metadata,
    ];

    $mobile = [];
    $email = [];
    if($profile->mobile_no)
      $mobile[] = $profile->mobile_no;

    if($profile->altmobile)
      $mobile[] = $profile->altmobile;

    if($profile->email)
      $email[] = $profile->email;

    if($profile->alt_email)
      $email[] = $profile->alt_email;

    $contact = [
      'mobile'=> $mobile,
      'email'=> $email
  	];

    $currentAddress= [
      'address'=> $profile->address,
      'barangayCode'=> $profile->address_barangay_code,
      'barangayName'=> $profile->barangay?$profile->barangay->brgyDesc:'',
      'cityCode'=> $profile->address_citymun_code,
      'cityName'=> $profile->city?$profile->city->citymunDesc:'',
      'provinceCode'=> $profile->address_province_code,
      'provinceName'=> $profile->province?$profile->province->provDesc:''
    ];

    $provincialAddress= [
      'isSameWithCurrent'=> false,
      'address'=> $profile->provadd,
      'barangayCode'=> $profile->provaddress_barangay_code,
      'barangayName'=> $profile->prov_barangay?$profile->prov_barangay->brgyDesc:'',
      'cityCode'=> $profile->provaddress_citymun_code,
      'cityName'=> $profile->prov_city?$profile->prov_city->citymunDesc:'',
      'provinceCode'=> $profile->provaddress_province_code,
      'provinceName'=> $profile->prov_province?$profile->prov_province->provDesc:''
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

    $dirty = $profile->getDirty();
    $oldValue = [];
    foreach($dirty as $key => $value){
      if($key == 'date_of_birth'){
        $oldValue['birthday'] = $profile->getOriginal($key);
      }
      else{
        $newKey = $key;
        $newKey = str_replace("_"," ",$newKey);
        $newKey = ucwords($newKey);
        $newKey = str_replace(" ","",$newKey);
        $newKey = lcfirst($newKey);

        $oldValue[$newKey] = $profile->getOriginal($key);
      }
    }


    return ['personal'=>$personal,'contact'=>$contact,'currentAddress'=>$currentAddress,'provincialAddress'=>$provincialAddress,'emergencyContact'=>$emergencyContact,'oldValue'=>$oldValue,'mpin'=>Auth::user()->defaultmpin,'username'=>Auth::user()->username];

  }



}
