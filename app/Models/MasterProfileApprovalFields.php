<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class MasterProfileApprovalFields extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'master_profile_approval_fields';
    public $timestamps = false;

}
