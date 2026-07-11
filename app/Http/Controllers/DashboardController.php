<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\EnergyLog;
use App\Models\SmartAlert;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {
        $chartData = EnergyLog::select(
    DB::raw('DATE(created_at) as tanggal'),
    DB::raw('SUM(energy) as total')
)
->groupBy('tanggal')
->orderBy('tanggal')
->get();
        $totalMachine = Machine::count();

        $totalMonitoring = EnergyLog::count();

        $totalEnergy = EnergyLog::sum('energy');

        $activeMachine = Machine::where('status', 'Aktif')->count();
        $latestAlert = SmartAlert::latest()->first();

      return view('dashboard', compact(
   
    'totalMachine',

    'totalMonitoring',

    'totalEnergy',

    'activeMachine',

    'chartData',

    'latestAlert'
));
    }
}
