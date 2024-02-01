<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Spot;
use App\Models\Society;

class Regional extends Model
{
    use HasFactory;

    protected $fillable = [
        'province',
        'district',
    ];

    public function spots(){
        return $this->hasMany(Spot::class);
    }

    public function societies(){
        return $this->hasMany(Society::class);
    }
}
