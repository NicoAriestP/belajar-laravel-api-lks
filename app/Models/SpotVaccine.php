<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Spot;
use App\Models\Vaccine;

class SpotVaccine extends Model
{
    use HasFactory;

    protected $fillable = [
        'spot_id',
        'vaccine_id',
    ];

    public function spot(){
        return $this->belongsTo(Spot::class, 'spot_id');
    }

    public function vaccine(){
        return $this->belongsTo(Vaccine::class);
    }


}
