<?php

namespace App\Action\CrewDoc;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CrewDoc;
use Auth;

class CrewDocUpdateAction
{

  public function execute($request, $id)
  {

    $record = CrewDoc::find($id);
    $data = $request->all();

    $document = [
        'internal_Code'  => $data['internal_Code'],
        'crew_no'  => $data['crew_no'],
        'type'  => $data['type'],
        'code'  => $data['code'],
        'typex'  => $data['typex'],
        'codex'  => $data['codex'],
        'name'  => $data['name'],
        'docno'  => $data['docno'],
        'grade'  => $data['grade'],
        'date_issue'  => $data['date_issue'],
        'date_exp'  => $data['date_exp'],
        'period'  => $data['period'],
        'location'  => $data['location'],
        'school'  => $data['school'],
        'date_acept'  => $data['date_acept'],
        'date_rec'  => $data['date_rec'],
        'date_4ward'  => $data['date_4ward'],
        'remarks'  => $data['remarks'],
        'vaxbrand'  => $data['vaxbrand'],
        'fullvax'  => $data['fullvax'],
        'verified'  => $data['verified'],
        'user_code'  => $data['user_code'],
        'pos_codex'  => $data['pos_codex'],
        'submitted'  => $data['submitted'],
        'subremarks'  => $data['subremarks'],
        'crewfile'  => $data['crewfile'],
        'woexpiry'  => $data['woexpiry'],
        'filex'  => $data['filex'],
        'created_by'  => $data['created_by'],
        'created_from'  => $data['created_from'],
        'is_deleted'  => $data['is_deleted'],
        'deleted_by'  => $data['deleted_by'],
        'delete_reason'  => $data['delete_reason'],
        'metadata'  => $data['metadata'],
        'tmp_filex'  => $data['tmp_filex'],
        'last_update'  => $data['last_update'],
        'status'  => $data['status'],
    ];

    $record->update($document);

    return $record;
  }



}
