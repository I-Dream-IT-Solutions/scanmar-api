<?php

namespace App\Action\CertificateRequest;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
use App\Models\CertificateRequest;
use App\Models\MasterCertificateType;

class CertificateRequestCreateAction
{

  public function execute($request)
  {
    $data = $request->all();

    $certificate_type = MasterCertificateType::find($data['certificate_type_id']);

    $records = CertificateRequest::create([
      'crew_no'  => Auth::user()->crew_no,
      'certificate_type_id'  => $data['certificate_type_id'],
      'certificate_type_option'  => $data['certificate_type_option'],
      'remarks'  => $data['remarks'],
      'created_by'  => Auth::user()->id,
      'created_date'  =>  date('Y-m-d H:i:s'),
      'modified_by'  => Auth::user()->id,
      'deleted_by'  => 0,
      'deleted_date'  => '1990-01-01 01:00:00',
      'uploaded_by'  => 0,
      'uploaded_file'  => '',
      'uploaded_date'  => '1990-01-01 01:00:00',
      'modified_date'  => date('Y-m-d H:i:s'),
      'status'  => config('constants.STAT_FOR_APPROVAL'),
    ]);

    return $records;
  }



}
