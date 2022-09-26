<?php

namespace App\Action\DocumentUpload;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\CrewDocumentUpload;
use Auth;

class DocumentUploadListAction
{

  public function execute($request)
  {
    $records = new CrewDocumentUpload();

    $records = $records->orderBy('id','DESC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();

    return $records;

  }


}
