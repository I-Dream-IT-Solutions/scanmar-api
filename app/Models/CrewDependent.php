<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class CrewDependent extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'crew_dependent';
    public $timestamps = false;

    protected $appends = [
  		'in_case_of_emergency'
  	];

    public function getBirthdateAttribute($date){
      return date('m-d-Y',strtotime($date));
  	}

    public function getStatusAttribute($value){
      $metaData = json_decode($this->metadata,true);
      if(isset($metaData['is_deleted']) && $metaData['is_deleted'] == 'Y')
        return config('constants.STAT_FOR_DELETION');

      return $value;
  	}

    public function getHasBenefitAttribute($value){
      if($value == 'T')
        return 1;
      else
        return 0;
  	}
    public function getInCaseOfEmergencyAttribute($value){
      if($value == 'T')
        return 1;
      else
        return 0;
  	}

    public function getMetadataAttribute($value){
      $metadata = str_replace('\\','',$value);
      $metadata = json_decode($value,true);
      if(is_array($metadata))
      $this->fill($metadata);

      return $value;
  	}

}
