.<?php

namespace App\Action\Education;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CrewEducation;

class EducationUpdateAction
{

  public function execute($request, $id)
  {
    $record = CrewEducation::find($id);
    $data = $request->all();
    $record->update($data);

    return $record;
  }



}
