<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Regional;
use App\Models\Consultation;
use App\Models\Vaccination;

class Society extends Model
{
    use HasFactory;

    protected $fillable = [
        'password',
        'name',
        'born_date',
        'gender',
        'address',
        'regional_id',
        'login_token',
    ];

    public function regional(){
        return $this->belongsTo(Regional::class, 'regional_id');
    }

    public function vaccinations(){
        return $this->hasMany(Vaccination::class);
    }

    public function consultations(){
        return $this->hasMany(Consultation::class);
    }
}
