<?php

namespace App\Action\CrewDoc;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CrewDoc;
use Auth;
use Storage;

class CrewDocUpdateAction
{

  public function execute($request, $id)
  {

    $record = CrewDoc::find($id);
    $data = $request->all();

    $filename = $record->crewfile;
    if ($request->hasFile('crewfile')) {
      $file = $request->file("crewfile");
      $newFilename = 'public/'. time() . '.' . $file->getClientOriginalName();
      $path = Storage::put($newFilename,file_get_contents($file));
      $filename = $newFilename;
    }

    $document = [
        // 'internal_Code'  => $data['internal_Code'],
        'type'  => $data['type'],
        // 'code'  => $data['code'],
        // 'typex'  => $data['typex'],
        // 'codex'  => $data['codex'],
        'name'  => $data['name'],
        'docno'  => $data['docno'],
        // 'grade'  => $data['grade'],
        'date_issue'  => $data['date_issue'],
        'date_exp'  => $data['date_exp'],
        // 'period'  => $data['period'],
        'location'  => $data['location'],
        'school'  => $data['school'],
        // 'date_acept'  => $data['date_acept'],
        // 'date_rec'  => $data['date_rec'],
        // 'date_4ward'  => $data['date_4ward'],
        'remarks'  => $data['remarks'],
        // 'vaxbrand'  => $data['vaxbrand'],
        // 'fullvax'  => $data['fullvax'],
        // 'verified'  => $data['verified'],
        // 'user_code'  => $data['user_code'],
        // 'pos_codex'  => $data['pos_codex'],
        // 'submitted'  => $data['submitted'],
        // 'subremarks'  => $data['subremarks'],
        'crewfile'  => $filename,
        // 'woexpiry'  => $data['woexpiry'],
        // 'filex'  => $data['filex'],
        // 'tmp_filex'  => $data['tmp_filex'],
        'last_update'  => date('Y-m-d H:i:s'),
        'status'  => config('constants.STAT_FOR_APPROVAL'),
    ];

    $record->update($document);

    return $record;
  }



}
