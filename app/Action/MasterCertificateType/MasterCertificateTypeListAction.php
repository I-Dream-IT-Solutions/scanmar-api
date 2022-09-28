<?php

namespace App\Action\MasterCertificateType;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\MasterCertificateType;
use Auth;

class MasterCertificateTypeListAction
{

  public function execute($request)
  {
    $records = new MasterCertificateType();

    $records = $records->orderBy('document_type_id','DESC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();


    return $records;
  }



}
