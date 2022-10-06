<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class MasterCertificateType extends Model
{

    use HasFactory;
    protected $guarded = [];
    protected $table = 'master_certificate_type';
    public $timestamps = false;

}
