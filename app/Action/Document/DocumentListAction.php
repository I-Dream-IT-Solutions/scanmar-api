<?php

namespace App\Action\Document;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\CrewDocument;
use Auth;

class DocumentListAction
{

  public function execute($request)
  {
    $records = new CrewDocument();

    $records = $records->orderBy('id','DESC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();

    return $records;

  }


}
