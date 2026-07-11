<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmartAlert extends Model
{
    use HasFactory;

    protected $fillable = [
        'machine_id',
        'temperature',
        'current',
        'voltage',
        'power',
        'health_score',
        'prediction',
        'risk_level',
        'confidence',
        'recommendation',
        'status'
    ];

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }
}