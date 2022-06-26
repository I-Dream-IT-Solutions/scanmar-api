<?php

namespace App\Action\Education;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CrewEducation;

class EducationShowAction
{

  public function execute($id)
  {
    $record = CrewEducation::find($id);


    return $record;
  }



}
