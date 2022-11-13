<?php

namespace App\Action\MasterDocumentType;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\MasterDocumentType;
use Auth;

class MasterDocumentTypeListAction
{

  public function execute($request)
  {
    $records = new MasterDocumentType();

    $records = $records->orderBy('document_type_name','ASC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();


    return $records;
  }



}
