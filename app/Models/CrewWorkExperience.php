<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class CrewWorkExperience extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'crew_work_experience';
    public $timestamps = false;

    protected $appends = [
  		'date_range','kw'
  	];

    public function getDateRangeAttribute(){
      return date('M d, Y',strtotime($this->datefrom)) .' - '.date('M d, Y',strtotime($this->dateto));
  	}

    public function getDatefromAttribute($value){
      return date('m-d-Y',strtotime($value));
  	}

    public function getDatetoAttribute($value){
      return date('m-d-Y',strtotime($value));
  	}

    public function getDatepromoAttribute($value){
      return date('m-d-Y',strtotime($value));
  	}

    public function getDatepromo1Attribute($value){
      return date('m-d-Y',strtotime($value));
  	}

    public function getDatepromo2Attribute($value){
      return date('m-d-Y',strtotime($value));
  	}

    public function getAdateembAttribute($value){
      return date('m-d-Y',strtotime($value));
  	}

    public function getAdatedisAttribute($value){
      return date('m-d-Y',strtotime($value));
  	}

    public function getAcodeAttribute($value){
      return (int)$value;
  	}

    public function getCausecodeAttribute($value){
      return (int)$value;
  	}

    public function getKwAttribute(){
      return $this->eng_kw;
  	}

    public function getStatusAttribute($value){
      $metaData = json_decode($this->metadata,true);
      if(isset($metaData['is_deleted']) && $metaData['is_deleted'] == 'Y')
        return config('constants.STAT_FOR_DELETION');

      return $value;
  	}

}
