<?php

namespace App\Services;

class AIService
{
    public function analyze($temperature, $current, $voltage, $power)
    {
        $prediction = "Normal";
        $risk = "LOW";
        $confidence = 95;
        $health = 100;
        $recommendation = "Mesin dalam kondisi normal.";

        if ($temperature >= 90) {

            $prediction = "Overheat";

            $risk = "CRITICAL";

            $confidence = 98;

            $health = 25;

            $recommendation = "Matikan mesin, cek kipas pendingin, hubungi teknisi.";

        }
        elseif ($temperature >= 75) {

            $prediction = "Warning";

            $risk = "HIGH";

            $confidence = 94;

            $health = 60;

            $recommendation = "Kurangi beban mesin.";

        }

        return [

            'prediction'=>$prediction,

            'risk'=>$risk,

            'confidence'=>$confidence,

            'health'=>$health,

            'recommendation'=>$recommendation

        ];
    }
}