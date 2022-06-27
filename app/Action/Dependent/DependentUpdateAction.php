<?php

namespace App\Action\Dependent;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CrewDependent;
use Auth;

class DependentUpdateAction
{

  public function execute($request, $id)
  {
    $record = CrewDependent::find($id);
    $data = $request->all();

    $educ = [
      'crew_no'  => Auth::user()->crew_no,
      'name'  => $data['name'],
      'relation'  => $data['relation'],
      'birthdate'  => date('Y-m-d',strtotime($data['birthdate'])),
      'address'  => $data['address'],
      'contact_no'  => $data['contact_no'],
      'modified_date'  => date('Y-m-d H:i:s'),
      // 'modified_by'  => Auth::user()->id,
      'status'  => config('constants.STAT_FOR_APPROVAL'),
    ];

    $record->update($educ);

    return $record;
  }



}
