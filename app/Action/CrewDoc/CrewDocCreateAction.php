<?php

namespace App\Action\CrewDoc;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
use App\Models\CrewDoc;
use Storage;

class CrewDocCreateAction
{

  public function execute($request)
  {
    $data = $request->all();

    $filename = '';
    if ($request->hasFile('crewfile')) {
      $file = $request->file("crewfile");
      $newFilename = 'public/'. time() . '.' . $file->getClientOriginalName();
      $path = Storage::put($newFilename,file_get_contents($file));
      $filename = $newFilename;
    }

    $records[] = CrewDoc::create([
      'internal_Code'  => '',
      'crew_no'  => Auth::user()->crew_no,
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
      'date_acept'  => '1900-01-01',
      'date_rec'  => '1900-01-01',
      'date_4ward'  => '1900-01-01',
      'remarks'  => $data['remarks'],
      'vaxbrand'  => '',
      'fullvax'  => '',
      'verified'  => '',
      'user_code'  => '',
      'pos_codex'  => '',
      'submitted'  => '',
      'subremarks'  => '',
      'crewfile'  => $filename,
      'woexpiry'  => '',
      'filex'  => '',
      'tmp_filex'  => '',
      'created_from'  => '',
      'deleted_by'  => '0',
      'delete_reason'  => '',
      'metadata'  => '',
      'created_by' => Auth::user()->id,
      'last_update'  => date('Y-m-d H:i:s'),
      'status'  => config('constants.STAT_FOR_APPROVAL'),
    ]);

    return $records;
  }



}
