<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Consultation;
use App\Models\Spot;
use App\Models\User;
use App\Models\Vaccination;

class Medical extends Model
{
    use HasFactory;

    protected $fillable = [
        'spot_id',
        'user_id',
        'role',
        'name',
    ];

    public function spot(){
        return $this->belongsTo(Spot::class, 'spot_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function consultations(){
        return $this->hasMany(Consultation::class);
    }

    public function vaccinations(){
        return $this->hasMany(Vaccination::class);
    }
}
