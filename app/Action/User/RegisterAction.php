<?php

namespace App\Action\User;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\SystemUser;
use App\Models\CrewProfile;
use Illuminate\Support\Facades\Hash;
use Validator;

class RegisterAction
{

  public $successStatus = 200;
  public function execute($request)
  {
    $validator = Validator::make($request->all(), [
      // 'first_name' => 'required',
      // 'last_name' => 'required',
      'email' => 'required|unique:system_user',
      'password' => 'required',
      'c_password' => 'required|same:password',
    ]);
    if ($validator->fails()) {
      return response()->json(['error'=>$validator->errors()], 401);
    }

    $prefix = date('Y');
    $crew_no = $prefix.sprintf('%04d', 1);

    $crewcCnt = CrewProfile::where('crew_no','LIKE','%'.$prefix.'%')->orderBy('id', 'desc')->count();
    if($crewcCnt){
      $crew_no = $prefix.sprintf('%04d', $crewcCnt + 1);
    }

    $input = $request->all();
    $input['password'] = Hash::make($input['password']);
    $input['is_crew'] = 'Y';
    $input['first_name'] = '';
    $input['middle_name'] = '';
    $input['suffix'] = '';
    $input['birthdate'] = '1990-01-01';
    $input['mobile_number'] = '';
    $input['alt_mobile'] = '';
    $input['telephone_number'] = '';
    $input['alt_email'] = '';
    $input['last_name'] = '';
    $input['access_level_id'] = '0';
    $input['username'] = $input['email'];
    $input['modified_date'] = date('Y-m-d');
    $input['created_date'] = date('Y-m-d');
    $input['created_by'] = '0';
    $input['modified_by'] = '0';
    $input['photo'] = '';
    $input['crew_profile_id'] = 0;
    $input['crew_no'] = $crew_no;
    $input['groupx'] = '';
    $input['with_reminder'] = '0';
    $input['with_import_export'] = '0';
    $input['allow_edit_posdoc'] = '0';
    $input['allow_to_chat_by_crew'] = '0';
    $input['with_crew_notification'] = '1';
    $input['with_announcement_notification'] = '1';
    $input['with_scheduler_notification'] = '1';
    unset($input['c_password']);
    unset($input['api_key']);
    $user = SystemUser::create($input);

    $profile = CrewProfile::create([
      'crew_no'=>$crew_no,
      'first_name'=>'',
      'last_name'=>'',
      'middle_name'=>'',
      'suffix'=>'',
      'gender'=>'',
      'date_of_birth'=>'1990-01-01',
      'place_of_birth'=>'',
      'nationality'=>'',
      'religion'=>'',
      'email'=>$input['email'],
      'alt_email'=>'',
      'mobile_no'=>'',
      'altmobile'=>'',
      'tel_no'=>'',
      'provadd'=>'',
      'provaddress_province_code'=>'',
      'provaddress_citymun_code'=>'',
      'provaddress_barangay_code'=>'',
      'provaddress_zipcode'=>'',
      'address'=>'',
      'address_region_code'=>'',
      'address_province_code'=>'',
      'address_citymun_code'=>'',
      'address_barangay_code'=>'',
      'address_zipcode'=>'',
      'employment_status_id'=>'0',
      'position_id'=>'0',
      'vessel_id'=>'0',
      'groupx'=>'',
      'deleted_date'=>'1990-01-01 00:00:00',
      'created_date'=>date('Y-m-d'),
      'modified_date'=>date('Y-m-d'),
      'created_by'=>'0',
      'modified_by'=>'0',
      'photo'=>'',
      'emergency_contact_name'=>'',
      'emergency_contact_no'=>'',
      'emergency_relation'=>'',
      'height'=>'',
      'weight'=>'',
      'footsize'=>'',
      'eyes_color'=>'',
      'waistline'=>'',
      'parka'=>'',
      'coverall'=>'',
      'metadata'=>'',
      'tmp_photo'=>'',
      'dtapplied'=>'1990-01-01',
      'entrydate'=>'1990-01-01',
      'datehired'=>'1990-01-01',
      'idno'=>'',
      'noengage'=>'0',
      'tax_code'=>'0',
      'haircolor'=>'',
      'dismark' => '',
      'bloodtype' => '',
      'lvision' => '',
      'rvision' => '',
      'seniority' => 0,
      'bregn' => '',
      'cregn' => '',
      'pregn' => '',
      'sss' => '',
      'tin' => '',
      'pagibig' => '',
      'phealth' => '',
      'foreignid' => '',
      'spouse' => '',
      'father' => '',
      'mother' => '',
      'emerlname' => '',
      'emerfname' => '',
      'emermname' => '',
      'emeradd' => '',
      'emerrelat' => '',
      'emertel' => '',
      'kinemail' => '',
      'hts' => '',
      'wts' => '',
      'nodep' => '',
      'dep1' => '',
      'dep2' => '',
      'dep3' => '',
      'dep4' => '',
      'recommend' => '',
      'relation' => '',
      'date_acept' => '1990-01-01',
      'date_rec' => '1990-01-01',
      'date_4ward' => '1990-01-01',
      'training' => '',
      'remarks' => '',
      'contract' => 0,
      'oecdate' => '1990-01-01',
      'nac' => '',
      'flagstate' => '',
      'vesremarks' => '',
      'page' => 0,
      'pager' => 0,
      'ro_amosup' => '',
      'lremarks' => '',
      'lonboard' => '',
      'inactive' => '',
      'user_code' => '',
      'longevity' => 0,
      'incentive' => 0,
      'addwages' => 0,
      'healthcard' => '',
      'hmissued' => '1990-01-01',
      'hmexpiry' => '1990-01-01',
      'loyalty' => '',
      'dateemb' => '1990-01-01',
      'datedis' => '1990-01-01',
      'cause' => '',
      'availablex' => '',
      'clubrate' => 0,
      'contsss' => '',
      'crewpid' => '',
      'cadet' => '',
      'vestype' => '',
      'transdt' => '1990-01-01 00:00:00',
      'date_available' => '1990-01-01',
      'status' => '',
      'foreignid_file' => '',
      'tmp_foreignid_file' => '',
      'sss_file' => '',
      'tmp_sss_file' => '',
      'tin_file' => '',
      'tmp_tin_file' => '',
      'pagibig_file' => '',
      'tmp_pagibig_file' => '',
      'phealth_file' => '',
      'cadet_group' => '',
      'tmp_phealth_file' => ''

    ]);

    $user->crew_profile_id = $profile->id;
    $user->save();
    $success['token'] =  $user->createToken('scanmar')->accessToken;
    return response()->json(['success'=>$success], $this->successStatus);
  }



}
