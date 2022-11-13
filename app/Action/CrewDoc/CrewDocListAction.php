<?php

namespace App\Action\CrewDoc;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\CrewDoc;
use Auth;

class CrewDocListAction
{

  public function execute($request)
  {
    $records = new CrewDoc();

    if($request->has('search')){
      $records = $records->where(function($q)use($request){
        $q->where('name','like',"%{$request->search}%")
        ->orWhereHas('document_type',function($q) use($request){
          $q->where('document_type_name','LIKE',"%$request->search%");
        })
        ->orWhereHas('document',function($q) use($request){
          $q->where('document_name','LIKE',"%$request->search%");
        });
      });
    }

    $records = $records->where('crew_no',Auth::user()->crew_no);
    $records = $records->where('is_deleted','N');
    $records = $records->orderBy('id','DESC');
    $records = $records->with(['document_type','document']);
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();

    foreach($records as $record){
      $metadata = str_replace('\\','',$record->metadata);
      $metadata = json_decode($record,true);

      if(is_array($metadata))
      $record->fill($metadata);
    }

    return $records;

  }


}
