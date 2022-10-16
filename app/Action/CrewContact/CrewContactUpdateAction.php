<?php

namespace App\Action\CrewContact;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CrewContact;
use Auth;

class CrewContactUpdateAction
{

  public function execute($request, $id)
  {
    $record = CrewContact::find($id);
    $data = $request->all();

    $contact = [
        'crew_no'  => Auth::user()->crew_no,
        'label'  => $data['label'],
        'description'  => $data['description'],
        'created_date'  => date('Y-m-d H:i:s'),
        'created_by'  => Auth::user()->id,
        'modified_date'  => date('Y-m-d H:i:s'),
        'modified_by'  => Auth::user()->id,
    ];

    $record->update($contact);

    return $record;
  }



}
