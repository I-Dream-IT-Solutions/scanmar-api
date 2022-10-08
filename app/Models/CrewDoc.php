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

    public function getDateIssueAttribute($date){
      return date('m-d-Y',strtotime($date));
  	}

    public function getDateExpAttribute($date){
      return date('m-d-Y',strtotime($date));
  	}

}
