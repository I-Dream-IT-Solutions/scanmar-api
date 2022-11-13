<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class CrewEducation extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'crew_education';
    public $timestamps = false;

    public function getStatusAttribute($value){
      $metaData = json_decode($this->metadata,true);
      if(isset($metaData['is_deleted']) && $metaData['is_deleted'] == 'Y')
        return config('constants.STAT_FOR_DELETION');

      return $value;
  	}

}
