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
      return $this->belongsTo(Barangay::class, 'address_barangay_code','brgyCode');
    }

    public function position(){
      return $this->belongsTo(MasterPosition::class, 'position_id');
    }

    public function province(){
      return $this->belongsTo(Province::class, 'address_province_code','provCode');
    }

    public function city(){
      return $this->belongsTo(City::class, 'address_citymun_code','citymunCode');
    }

    public function prov_barangay(){
      return $this->belongsTo(Barangay::class, 'provaddress_barangay_code','brgyCode');
    }

    public function prov_province(){
      return $this->belongsTo(Province::class, 'provaddress_province_code','provCode');
    }

    public function prov_city(){
      return $this->belongsTo(City::class, 'provaddress_citymun_code','citymunCode');
    }

    public function getPhotoAttribute($value)
    {
      if($this->tmp_photo)
        return "https://scanmar.ph/crew-application/uploads/crew/" . Auth::user()->crew_no . "/".$this->tmp_photo;
      else
        return "https://scanmar.ph/crew-application/uploads/crew/" . Auth::user()->crew_no . "/".$value;
    }

}
