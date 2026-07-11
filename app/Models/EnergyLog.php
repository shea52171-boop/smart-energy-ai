<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnergyLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'machine_id',
        'voltage',
        'current',
        'power',
         'temperature',
        'energy',
        'duration'
    ];

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }
}