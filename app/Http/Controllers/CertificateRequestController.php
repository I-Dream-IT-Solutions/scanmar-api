<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\CertificateRequest\CertificateRequestCreateAction;
use App\Action\CertificateRequest\CertificateRequestDeleteAction;
use App\Action\CertificateRequest\CertificateRequestListAction;
use App\Action\CertificateRequest\CertificateRequestShowAction;
use App\Action\CertificateRequest\CertificateRequestUpdateAction;
use Auth;
use Validator;
use Log;
use DB;
use App\Http\Requests\CertificateRequest\CertificateRequestCreateRequest;
use App\Http\Requests\CertificateRequest\CertificateRequestUpdateRequest;

class CertificateRequestController extends Controller
{
    public function index(Request $request){
        $action = new CertificateRequestListAction();
        $data = $action->execute($request);
        return $data;
      }
    
      public function store(CertificateRequestCreateRequest $request){
        $action = new CertificateRequestCreateAction();
        $data = $action->execute($request);
        return $data;
      }
    
      public function show($id){
        $action = new CertificateRequestShowAction();
        $data = $action->execute($id);
        return $data;
      }
    
      public function update(CertificateRequestUpdateRequest $request,$id){
        $action = new CertificateRequestUpdateAction();
        $data = $action->execute($request,$id);
        return $data;
      }
    
      public function destroy($id){
        $action = new CertificateRequestDeleteAction();
        $data = $action->execute($id);
        return $data;
      }
}
