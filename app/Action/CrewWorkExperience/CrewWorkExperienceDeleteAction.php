<?php

namespace App\Action\CrewWorkExperience;

use Illuminate\Pagination\Paginator;
use Session;
use Storage;
use Log;
use App\Models\CrewWorkExperience;

class CrewWorkExperienceDeleteAction
{

  public function execute($id)
  {
    $data = CrewWorkExperience::find($id);

    $data->status = config('constants.STAT_FOR_DELETION');
    $data->save();
    return $data;
  }



}
