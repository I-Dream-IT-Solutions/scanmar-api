<?php

namespace App\Action\CertificateRequest;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
use App\Models\CertificateRequest;

class CertificateRequestCreateAction
{

  public function execute($request)
  {
    $data = $request->all();
    $records[] = CertificateRequest::create([
      'crew_no'  => Auth::user()->crew_no,
      'certificate_type_id'  => $data['certificate_type_id'],
      'certificate_type_option'  => $data['certificate_type_option'],
      'remarks'  => $data['remarks'],
      'created_by'  => $data['created_by'],
      'created_date'  => $data['created_date'],
      'modified_by'  => $data['modified_by'],
      'modified_date'  => date('Y-m-d H:i:s'),
      'status'  => config('constants.STAT_FOR_APPROVAL'),
    ]);

    return $records;
  }



}
