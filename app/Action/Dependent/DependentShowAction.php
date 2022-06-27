<?php

namespace App\Action\Dependent;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CrewDependent;

class DependentShowAction
{

  public function execute($id)
  {
    $record = CrewDependent::find($id);


    return $record;
  }



}
