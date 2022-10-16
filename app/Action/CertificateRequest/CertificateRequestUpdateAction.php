<?php

namespace App\Action\CertificateRequest;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CertificateRequest;
use Auth;
use Storage;
class CertificateRequestUpdateAction
{

  public function execute($request, $id)
  {
    $record = CertificateRequest::find($id);
    $data = $request->all();
    $filename = '';
    if ($request->hasFile('uploaded_file')) {
      $file = $request->file("uploaded_file");
      $newFilename = 'public/'. time() . '.' . $file->getClientOriginalName();
      $path = Storage::put($newFilename,file_get_contents($file));
      $filename = $newFilename;
    }
    $cert = [
        'crew_no'  => Auth::user()->crew_no,
        'certificate_type_id'  => $data['certificate_type_id'],
        'certificate_type_option'  => $data['certificate_type_option'],
        'remarks'  => $data['remarks'],
        'created_by'  => $data['created_by'],
        'created_date'  => $data['created_date'],
        'modified_by'  => Auth::user()->id,
        'modified_date'  => date('Y-m-d H:i:s'),
        'uploaded_file'  => $filename,
        'status'  => config('constants.STAT_FOR_APPROVAL'),
    ];

    $record->update($cert);

    return $record;
  }



}
