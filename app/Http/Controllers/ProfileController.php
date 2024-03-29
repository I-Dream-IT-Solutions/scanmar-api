<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\Profile\PersonalInformationUpdateAction;
use App\Action\Profile\CurrentAddressUpdateAction;
use App\Action\Profile\EmergencyContactUpdateAction;
use App\Action\Profile\ProvincialAddressUpdateAction;
use Auth;
use Validator;
use Log;
use DB;
use App\Http\Requests\Profile\PersonalInformationUpdateRequest;
use App\Http\Requests\Profile\EmergencyContactUpdateRequest;
use App\Http\Requests\Profile\CurrentAddressUpdateRequest;
use App\Http\Requests\Profile\ProvincialAddressUpdateRequest;
use Storage;
use Image;

class ProfileController extends Controller
{

  public function personalInformation(PersonalInformationUpdateRequest $request){
    $action = new PersonalInformationUpdateAction();
    $data = $action->execute($request);
    return $data;
  }

  public function currentAddress(CurrentAddressUpdateRequest $request){
    $action = new CurrentAddressUpdateAction();
    $data = $action->execute($request);
    return $data;
  }

  public function provincialAddress(ProvincialAddressUpdateRequest $request){
    $action = new ProvincialAddressUpdateAction();
    $data = $action->execute($request);
    return $data;
  }

  public function emergencyContact(EmergencyContactUpdateRequest $request){
    $action = new EmergencyContactUpdateAction();
    $data = $action->execute($request);
    return $data;
  }

  public function viewImage(Request $request)
  {
    $image_url = $request->get('image');
    $storagePath = Storage::get($image_url);

    return Image::make($storagePath)->response();
  }

}
