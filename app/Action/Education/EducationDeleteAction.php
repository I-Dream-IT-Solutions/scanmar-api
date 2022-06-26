<?php

namespace App\Action\Education;

use Illuminate\Pagination\Paginator;
use Session;
use Storage;
use Log;
use App\Models\CrewEducation;

class EducationDeleteAction
{

  public function execute($id)
  {
    $data = CrewEducation::find($id);

    $data->status = config('constants.STAT_FOR_DELETION');
    $data->save();
    return $data;
  }



}
