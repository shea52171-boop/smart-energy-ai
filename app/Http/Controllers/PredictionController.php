<?php

namespace App\Http\Controllers;

use App\Models\EnergyLog;
use App\Services\AIService;

class PredictionController extends Controller
{
    public function index()
    {
        $last = EnergyLog::latest()->first();

        if (!$last) {
            return view('prediction', [
                'today' => 0,
                'prediction' => 0,
                'status' => 'Belum ada data'
            ]);
        }

        $today = $last->energy;
        $prediction = $today * 1.10;

        if ($prediction > 50) {
            $status = 'Tinggi';
        } elseif ($prediction > 20) {
            $status = 'Sedang';
        } else {
            $status = 'Normal';
        }

        // UBAH BARIS INI: Kirim variabel $today, $prediction, dan $status ke view
        return view('machines.prediction', compact('today', 'prediction', 'status'));
    }
}