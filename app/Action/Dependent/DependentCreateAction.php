<?php

namespace App\Action\Dependent;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
use App\Models\CrewDependent;

class DependentCreateAction
{

  public function execute($request)
  {
    $data = $request->all();
    $records[] = CrewDependent::create([
      'crew_no'  => Auth::user()->crew_no,
      'name'  => $data['name'],
      'relation'  => $data['relation'],
      'birthdate'  => date('Y-m-d',strtotime($data['birthdate'])),
      'address'  => $data['address'],
      'contact_no'  => $data['contact_no'],
      'modified_date'  => date('Y-m-d H:i:s'),
      // 'modified_by'  => Auth::user()->id,
      'status'  => config('constants.STAT_FOR_APPROVAL'),
    ]);

    return $records;
  }



}
