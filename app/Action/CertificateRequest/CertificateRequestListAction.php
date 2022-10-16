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

    $records = CertificateRequest::join('master_certificate_type','master_certificate_type.id','=','crew_certificate_request.certificate_type_id');

    $records = $records->where('crew_no',Auth::user()->crew_no);
    if($request->has('search'))
    $records = $records->where('master_certificate_type.name','like','%'.$request->get('search').'%')
      ->orWhere('master_certificate_type.options','like','%'.$request->get('search').'%');

    $records = $records->orderBy('crew_certificate_request.id','ASC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();


    return $records;
  }



}
