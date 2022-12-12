<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class CrewDoc extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'crew_doc';
    public $timestamps = false;

    public function document_type(){
      return $this->belongsTo(MasterDocumentType::class, 'type','document_type_id');
    }

    public function document(){
      return $this->belongsTo(MasterDocument::class, 'code','code');
    }

    public function getDateIssueAttribute($value){
      if($value){
        $date = substr($value, 0, 4).'-'.substr($value, 6,2).'-'.substr($value, 4,2);
        return date('m-d-Y',strtotime($date));
      }
      return null;
  	}

    public function getDateExpAttribute($value){
      if($value){
      $date = substr($value, 0, 4).'-'.substr($value, 6,2).'-'.substr($value, 4,2);
      return date('m-d-Y',strtotime($date));
      }
      return null;
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
