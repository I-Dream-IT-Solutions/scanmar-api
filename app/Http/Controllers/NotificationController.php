<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\Notification\NotificationListAction;
use App\Action\Notification\NotificationCountUnreadAction;
use Auth;
use Validator;
use Log;
use DB;

class NotificationController extends Controller
{

  public function index(Request $request){
    $action = new NotificationListAction();
    $data = $action->execute($request);
    return $data;
  }

  public function countUnread(Request $request){
    $action = new NotificationCountUnreadAction();
    $data = $action->execute($request);
    return $data;
  }

}
