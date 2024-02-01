<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Society;
use App\Models\Medical;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'society_id',
        'doctor_id',
        'status',
        'disease_history',
        'current_symptomps',
        'doctor_notes',
    ];

    public function society(){
        return $this->belongsTo(Society::class, 'society_id');
    }

    public function doctor(){
        return $this->belongsTo(Medical::class, 'doctor_id');
    }
}
