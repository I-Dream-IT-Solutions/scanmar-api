<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Payroll extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'crew_payroll';
    public $timestamps = false;

    public function master_payroll_type(){
      return $this->belongsTo(MasterPayrollType::class, 'type','type');
    }

    public function getModDateAttribute($value){
      return date('M Y',strtotime($this->year.'-'.$this->month.'-01'));
  	}

}
