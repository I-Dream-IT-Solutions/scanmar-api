<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\Address\RegionListAction;
use App\Action\Address\ProvinceListAction;
use App\Action\Address\CityListAction;
use App\Action\Address\BarangayListAction;
use Auth;
use Validator;
use Log;
use DB;


class AddressController extends Controller
{

  public function index(Request $request){
    $action = new RegionListAction();
    $data = $action->execute($request);
    return $data;
  }

  public function province(Request $request){
    $action = new ProvinceListAction();
    $data = $action->execute($request);
    return $data;
  }

  public function city(Request $request){
    $action = new CityListAction();
    $data = $action->execute($request);
    return $data;
  }

  public function barangay(Request $request){
    $action = new BarangayListAction();
    $data = $action->execute($request);
    return $data;
  }


}
