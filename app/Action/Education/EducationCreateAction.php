<?php

namespace App\Action\Education;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
use App\Models\CrewEducation;

class EducationCreateAction
{

  public function execute($request)
  {
    $data = $request->all();
    $records[] = CrewEducation::create([
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
    ]);

    return $records;
  }



}
