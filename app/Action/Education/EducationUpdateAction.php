<?php

namespace App\Action\Education;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CrewEducation;
use Auth;

class EducationUpdateAction
{

  public function execute($request, $id)
  {
    $record = CrewEducation::find($id);
    $data = $request->all();

    $educ = [
      'crew_no'  => Auth::user()->crew_no,
      'level'  => $data['level'],
      'school'  => $data['school'],
      'school_address'  => $data['school_address'],
      'course'  => $data['course'],
      'yearfrom'  => $data['yearfrom'],
      'yearto'  => $data['yearto'],
      'modified_date'  => date('Y-m-d H:i:s'),
      'modified_by'  => Auth::user()->id,
      'status'  => config('constants.STAT_FOR_APPROVAL'),
    ];

    $record->update($educ);

    return $record;
  }



}
