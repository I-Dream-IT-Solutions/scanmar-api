<?php

namespace App\Action\CrewContact;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CrewContact;

class CrewContactShowAction
{

  public function execute($id)
  {
    $record = CrewContact::find($id);

    return $record;
  }


}