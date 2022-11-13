<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateRequest extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'crew_certificate_request';
    public $timestamps = false;

    public function certificate_type(){
        return $this->belongsTo(MasterCertificateType::class, 'certificate_type_id');
      }
}
