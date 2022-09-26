<?php

namespace App\Action\DocMedicalCondition;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\CrewDocMedicalCondition;
use Auth;

class DocMedicalConditionListAction
{

  public function execute($request)
  {
    $records = new CrewDocMedicalCondition();

    $records = $records->orderBy('id','DESC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();

    return $records;

  }


}
