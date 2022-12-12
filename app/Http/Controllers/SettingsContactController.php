<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Action\SettingsContact\SettingsContactCreateAction;
use App\Action\SettingsContact\SettingsContactSetDefaultAction;
use App\Action\SettingsContact\SettingsContactDeleteAction;
use Auth;
use Validator;
use Log;
use DB;


class SettingsContactController extends Controller
{

      public function create(Request $request){
        $action = new SettingsContactCreateAction();
        $data = $action->execute($request);
        return $data;
      }

      public function setDefault(Request $request){
        $action = new SettingsContactSetDefaultAction();
        $data = $action->execute($request);
        return $data;
      }

      public function deleteContact(Request $request){
        $action = new SettingsContactDeleteAction();
        $data = $action->execute($request);
        return $data;
      }

}
