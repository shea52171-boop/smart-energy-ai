<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    public function sendMessage($target, $message)
    {
        $response = Http::withHeaders([
            'Authorization' => config('services.fonnte.token')
        ])->asForm()->post('https://api.fonnte.com/send', [
            'target' => $target,
            'message' => $message,
        ]);
        dd($response->status(), $response->body());

        Log::info('FONNTE RESPONSE', [
            'status' => $response->status(),
            'body' => $response->body(),
        ]);

        return $response->json();
    }
}