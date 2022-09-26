<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class MasterAgency extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'master_agency';
    public $timestamps = false;

}
