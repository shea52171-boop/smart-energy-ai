<?php

namespace App\Http\Controllers;

use App\Models\EnergyLog;
use App\Models\Machine;
use App\Models\SmartAlert;
use App\Services\AIService;
use App\Services\WhatsAppService;
use Illuminate\Http\Request;

class EnergyLogController extends Controller
{
    protected $whatsapp;

    public function __construct(WhatsAppService $whatsapp)
    {
        $this->whatsapp = $whatsapp;
    }

    public function index()
    {
        $logs = EnergyLog::with('machine')->latest()->get();

        return view('energy_logs.index', compact('logs'));
    }

    public function create()
    {
        $machines = Machine::all();

        return view('energy_logs.create', compact('machines'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'machine_id' => 'required',
            'voltage' => 'required|numeric',
            'current' => 'required|numeric',
            'temperature' => 'required|numeric',
            'duration' => 'required|numeric'
        ]);

        // Hitung daya dan energi
        $power = $request->voltage * $request->current;
        $energy = ($power * $request->duration) / 1000;

        // Simpan monitoring
        $log = EnergyLog::create([
            'machine_id' => $request->machine_id,
            'voltage' => $request->voltage,
            'current' => $request->current,
            'power' => $power,
            'temperature' => $request->temperature,
            'duration' => $request->duration,
            'energy' => $energy
        ]);

        // Jalankan AI
        $ai = new AIService();

        $result = $ai->analyze(
            $request->temperature,
            $request->current,
            $request->voltage,
            $power
        );

        // Jika hasil AI bukan Normal
        if ($result['prediction'] != "Normal") {

            // Simpan Smart Alert
            $alert = SmartAlert::create([
                'machine_id'      => $request->machine_id,
                'temperature'     => $request->temperature,
                'current'         => $request->current,
                'voltage'         => $request->voltage,
                'power'           => $power,
                'health_score'    => $result['health'],
                'prediction'      => $result['prediction'],
                'risk_level'      => $result['risk'],
                'confidence'      => $result['confidence'],
                'recommendation'  => $result['recommendation'],
                'status'          => 'OPEN'
            ]);

            // Format pesan WhatsApp
            $message = "🚨 SMART ENERGY AI\n";
            $message .= "=====================\n\n";
            $message .= "⚠ PERINGATAN MESIN\n\n";
            $message .= "🏭 Mesin : " . $log->machine->nama_mesin . "\n";
            $message .= "🤖 Status : " . $result['prediction'] . "\n";
            $message .= "🌡 Suhu : " . $request->temperature . "°C\n";
            $message .= "⚡ Arus : " . $request->current . " A\n";
            $message .= "🔌 Tegangan : " . $request->voltage . " V\n";
            $message .= "💡 Daya : " . number_format($power,2) . " Watt\n";
            $message .= "🎯 Confidence : " . $result['confidence'] . "%\n\n";
            $message .= "📋 Recommendation\n";
            $message .= $result['recommendation'];

            // Kirim WhatsApp
            $this->whatsapp->sendMessage(
                env('WHATSAPP_ADMIN'), // Ganti dengan nomor WhatsApp tujuan
                $message
            );
        }

        return redirect()->route('energy-logs.index')
            ->with('success', 'Monitoring berhasil ditambahkan.');
    }
}