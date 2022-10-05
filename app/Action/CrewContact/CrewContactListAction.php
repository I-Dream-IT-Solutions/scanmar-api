<?php

namespace App\Action\CrewContact;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\CrewContact;
use Auth;

class CrewContactListAction
{

  public function execute($request)
  {
    $records = new CrewContact();

    $records = $records->orderBy('id','ASC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();

    return $records;

  }



}
