<?php

namespace App\Action\CertificateRequest;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
use Storage;
use App\Models\CertificateRequest;

class CertificateRequestCreateAction
{

  public function execute($request)
  {
    $data = $request->all();

    $filename = '';
    if ($request->hasFile('uploaded_file')) {
      $file = $request->file("uploaded_file");
      $newFilename = 'public/'. time() . '.' . $file->getClientOriginalName();
      $path = Storage::put($newFilename,file_get_contents($file));
      $filename = $newFilename;
    }

    $records[] = CertificateRequest::create([
      'crew_no'  => Auth::user()->crew_no,
      'certificate_type_id'  => $data['certificate_type_id'],
      'certificate_type_option'  => $data['certificate_type_option'],
      'remarks'  => $data['remarks'],
      'created_by'  => Auth::user()->id,
      'created_date'  =>  date('Y-m-d H:i:s'),
      'modified_by'  => '0',
      'modified_date'  => date('Y-m-d H:i:s'),
      'deleted_by'  => '0',
      'deleted_date'  => date('Y-m-d H:i:s'),
      'uploaded_file'  => $filename,
      'uploaded_date'  => date('Y-m-d H:i:s'),
      'uploaded_by'  => Auth::user()->id,
      'status'  => config('constants.STAT_FOR_APPROVAL'),
    ]);

    return $records;
  }



}
