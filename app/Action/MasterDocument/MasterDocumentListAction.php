<?php

namespace App\Action\MasterDocument;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\MasterDocument;
use Auth;

class MasterDocumentListAction
{

  public function execute($request)
  {
    $records = new MasterDocument();

    if($request->has('type'))
      $records = $records->where('type',$request->get('type'));

    $records = $records->where('is_deleted','N');
    $records = $records->orderBy('document_name','ASC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();


    return $records;
  }



}
