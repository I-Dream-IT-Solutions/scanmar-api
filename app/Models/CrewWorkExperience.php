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
  		'date_range'
  	];

    public function getDateRangeAttribute(){

      return date('M d, Y',strtotime($this->datefrom)) .' - '.date('M d, Y',strtotime($this->dateto));
  	}

}
