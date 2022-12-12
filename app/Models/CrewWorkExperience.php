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
      $dateFrom = $this->datefrom;
      $dateto = $this->dateto;

      $monthFrom = date("F", mktime(0, 0, 0, (int)substr($dateFrom, 0, 2), 10));
      $dayFrom = substr($dateFrom, 3, 2);
      $yearFrom = substr($dateFrom, 6, 4);


      $monthTo = date("F", mktime(0, 0, 0, (int)substr($dateto, 0, 2), 10));
      $dayTo = substr($dateto, 3, 2);
      $yearTo = substr($dateto, 6, 4);

      $dateFrom = $monthFrom .' '.$dayFrom.', '.$yearFrom;
      $dateto = $monthTo .' '.$dayTo.', '.$yearTo;

      return $dateFrom .' - '.$dateto;
  	}

    public function getDatefromAttribute($value){
      if($value){
        $date = substr($value, 6, 2).'-'.substr($value, 4,2).'-'.substr($value, 0,4);

        return $date;
      }
      return null;
  	}

    public function getDatetoAttribute($value){
      if($value){
      $date = substr($value, 6, 2).'-'.substr($value, 4,2).'-'.substr($value, 0,4);

      return $date;
      }
      return null;
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

    public function getEnginecodeAttribute($value){
      return (int)$value;
  	}

    public function getKwAttribute(){
      return $this->gear;
  	}

    public function getStatusAttribute($value){
      $metaData = json_decode($this->metadata,true);
      if(isset($metaData['is_deleted']) && $metaData['is_deleted'] == 'Y')
        return config('constants.STAT_FOR_DELETION');

      return $value;
  	}

    public function getMetadataAttribute($value){
      $metadata = str_replace('\\','',$value);
      $metadata = json_decode($value,true);
      if(is_array($metadata))
      $this->fill($metadata);

      return $value;
  	}

}
