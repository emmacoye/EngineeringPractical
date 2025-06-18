<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherApiService
{
    public function getCurrent(float $lat, float $lon): array
    {
        $res = Http::get('https://api.open-meteo.com/v1/forecast', [
            'latitude'        => $lat,
            'longitude'       => $lon,
            'current_weather' => true,
        ]);
        return $res->json('current_weather');
    }
}