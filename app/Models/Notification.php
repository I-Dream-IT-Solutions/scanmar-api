<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Carbon\Carbon;

class Notification extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'notification';
    protected $primaryKey = 'notification_id';
    public $timestamps = false;

    protected $appends = [
  		'ago','message'
  	];


    public function getAgoAttribute(){
      $dt = Carbon::parse($this->created_date);
      return $dt->diffForHumans();
  	}

    public function getMessageAttribute(){
      $value = '';

      $notification_content = (array)json_decode($this->notification_content);
      if($this->notification_type != 'approve_disapprove_profile'){
        return $notification_content['item_name'];
      }

        $message = '';
        if(count($notification_content['approved'])) {
          $message .= 'List of Approved Field: <br />';
          foreach($notification_content['approved'] as $val){
            $val= (array)$val;
            $message .= $val['field'] .' : '. $val['remarks'].' <br />';
          }
        }
        if(count($notification_content['disapproved'])){
          $message .= 'List of Dispproved Field: <br />';
          foreach($notification_content['disapproved'] as $val){
            $val= (array)$val;
            $message .= $val['field'] .' : '. $val['remarks'].' <br />';
          }
        }

        return $message;

  	}

}
