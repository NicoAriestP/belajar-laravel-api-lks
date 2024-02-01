<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Regional;
use App\Models\SpotVaccine;
use App\Models\Medical;
use App\Models\Vaccination;

class Spot extends Model
{
    use HasFactory;

    protected $fillable = [
        'regional_id',
        'name',
        'address',
        'serve',
        'capacity',
    ];

    public function regional(){
        return $this->belongsTo(Regional::class, 'regional_id');
    }

    public function spotVaccines(){
        return $this->hasMany(SpotVaccine::class);
    }

    public function medicals(){
        return $this->hasMany(Medical::class);
    }

    public function vaccinations(){
        return $this->hasMany(Vaccination::class);
    }
}
