<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class MasterPayrollType extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'master_payroll_type';
    public $timestamps = false;

}
