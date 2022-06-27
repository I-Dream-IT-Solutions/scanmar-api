<?php

namespace App\Action\Dependent;

use Illuminate\Pagination\Paginator;
use Session;
use Storage;
use Log;
use App\Models\CrewDependent;

class DependentDeleteAction
{

  public function execute($id)
  {
    $data = CrewDependent::find($id);

    $data->status = config('constants.STAT_FOR_DELETION');
    $data->save();
    return $data;
  }



}
