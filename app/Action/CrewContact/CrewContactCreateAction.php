<?php

namespace App\Action\CrewContact;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
use App\Models\CrewContact;

class CrewContactCreateAction
{

  public function execute($request)
  {
    $data = $request->all();
    $records = CrewContact::create([
      'crew_no'  => Auth::user()->crew_no,
      'label'  => $data['label'],
      'description'  => $data['description'],
      'created_date'  => date('Y-m-d H:i:s'),
      'created_by'  => Auth::user()->id,
      'deleted_by'  => '0',
      'modified_date'  => date('Y-m-d H:i:s'),
      'modified_by'  => Auth::user()->id,
    ]);

    return $records;
  }



}
