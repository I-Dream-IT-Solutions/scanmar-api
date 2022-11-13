<?php

namespace App\Action\Notification;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\Notification;
use Auth;

class NotificationListAction
{

  public function execute($request)
  {

    $records = new Notification();
    $records = $records->where('target_id','like','%"'.Auth::user()->id.'"%');

    if($request->has('search')){
      $records = $records->where(function($q)use($request){
        $q->where('notification_type','like','%'.$request->get('search').'%')
        ->orWhere('created_date','like','%'.$request->get('search').'%');
      });
    }

    $records = $records->orderBy('created_date','DESC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();


    return $records;
  }



}
