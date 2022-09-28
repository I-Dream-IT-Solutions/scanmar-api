<?php

namespace App\Action\CrewDoc;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CrewDoc;
use App\Models\Notification;
use App\Models\SystemUser;
use Storage;

class CrewDocExportAction
{

  public function execute($request, $id)
  {
    $record = CrewDoc::find($id);
    $path = "https://scanmar.ph/crew-application/uploads/crew/".$record->crew_no."/". $record->filex;
    Storage::disk('local')->put($record->filex, file_get_contents($path));

    $path = Storage::path($record->filex);

    return response()->download($path);

  }



}
