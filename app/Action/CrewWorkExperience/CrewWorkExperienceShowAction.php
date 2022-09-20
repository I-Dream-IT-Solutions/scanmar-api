<?php

namespace App\Action\CrewWorkExperience;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CrewWorkExperience;

class CrewWorkExperienceShowAction
{

  public function execute($id)
  {
    $record = CrewWorkExperience::find($id);


    return $record;
  }



}
