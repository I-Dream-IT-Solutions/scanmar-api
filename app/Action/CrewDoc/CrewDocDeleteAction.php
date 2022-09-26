<?php

namespace App\Action\CrewDoc;

use Illuminate\Pagination\Paginator;
use Session;
use Storage;
use Log;
use App\Models\CrewDoc;

class CrewDocDeleteAction
{

  public function execute($id)
  {
    $data = CrewDoc::find($id);

    $data->status = config('constants.STAT_FOR_DELETION');
    $data->save();
    
    return $data;
  }



}
