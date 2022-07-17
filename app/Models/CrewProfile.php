<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class CrewProfile extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'crew_profile';
    public $timestamps = false;


    public function barangay(){
      return $this->belongsTo(Barangay::class, 'address_barangay_code');
    }

    public function province(){
      return $this->belongsTo(Province::class, 'address_province_code');
    }

    public function city(){
      return $this->belongsTo(City::class, 'address_city_muni_code');
    }

    public function prov_barangay(){
      return $this->belongsTo(Barangay::class, 'prov_address_barangay_code');
    }

    public function prov_province(){
      return $this->belongsTo(Province::class, 'prov_address_province_code');
    }

    public function prov_city(){
      return $this->belongsTo(City::class, 'prov_address_city_muni_code');
    }

    public function getPhotoAttribute($value)
    {
      return url('image?image='.$value);
    }

}
