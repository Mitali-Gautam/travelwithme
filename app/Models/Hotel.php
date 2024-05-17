<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = ['name','country_id','city_id','description','address','postal_code','contact_no','email','rating','check_in','check_out','hotel_temp_image_name'];

    public function country() {
        return $this->belongsTo(Country::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }
}
