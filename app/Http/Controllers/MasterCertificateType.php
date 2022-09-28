<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\MasterCertificateType\MasterCertificateTypeListAction;
use Auth;
use Validator;
use Log;
use DB;

class MasterCertificateType extends Controller
{
    public function index(Request $request){
        $action = new MasterCertificateTypeListAction();
        $data = $action->execute($request);
        return $data;
      }
}
