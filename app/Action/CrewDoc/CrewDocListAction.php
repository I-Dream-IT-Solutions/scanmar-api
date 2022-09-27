<?php

namespace App\Action\CrewDoc;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\CrewDoc;
use Auth;

class CrewDocListAction
{

  public function execute($request)
  {
    $records = new CrewDoc();

    $records = $records->orderBy('id','DESC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();

    return $records;

  }


}
