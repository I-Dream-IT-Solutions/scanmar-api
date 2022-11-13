<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class MasterBankBranch extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'master_bankbranch';
    public $timestamps = false;
}
