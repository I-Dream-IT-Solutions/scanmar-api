<?php

namespace App\Action\CertificateRequest;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\CertificateRequest;
use Auth;

class CertificateRequestListAction
{

  public function execute($request)
  {

    $records = new CertificateRequest();

    $records = $records->where('crew_no',Auth::user()->crew_no);
    if($request->has('search')){
      $records = $records->where(function($q)use($request){
        $q->whereHas('certificate_type',function($q)use($request){
          $q->where('name','like','%'.$request->get('search').'%');
        })->orWhere('certificate_type_option','like','%'.$request->get('search').'%');
      });
    }

    $records = $records->orderBy('crew_certificate_request.id','ASC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();


    return $records;
  }



}
