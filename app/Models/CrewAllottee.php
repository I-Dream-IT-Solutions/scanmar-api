<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class CrewAllottee extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'crew_allottee';
    public $timestamps = false;

    public function getBirthdateAttribute($date){
      return date('m-d-Y',strtotime($date));
  	}

}
