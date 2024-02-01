<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SpotVaccine;
use App\Models\Vaccination;

class Vaccine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function spotVaccines(){
        return $this->hasMany(SpotVaccine::class);
    }

    public function vaccinations(){
        return $this->hasMany(Vaccination::class);
    }
}
