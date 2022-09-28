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

    $records = $records->orderBy('id','DESC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();


    return $records;
  }



}
