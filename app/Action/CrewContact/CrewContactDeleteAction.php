<?php

namespace App\Action\CrewContact;

use Illuminate\Pagination\Paginator;
use Session;
use Storage;
use Log;
use Auth;
use App\Models\CrewContact;

class CrewContactDeleteAction
{

  public function execute($id)
  {
    $data = CrewContact::find($id);
    $data->deleted_by = 1;
    $data->is_deleted = 'Y';
    $data->save();
    return $data;
  }



}
