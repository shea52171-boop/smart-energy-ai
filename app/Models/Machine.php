<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_mesin',
        'nama_mesin',
        'lokasi',
        'jenis_mesin',
        'daya_maksimal',
        'status'
    ];

    public function energyLogs()
    {
        return $this->hasMany(EnergyLog::class);
    }
}