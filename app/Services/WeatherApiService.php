<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherApiService
{
    public function getCurrentWeather(float $lat, float $lon): array
    {
        $res = Http::get('https://api.open-meteo.com/v1/forecast', [
            'latitude'  => $lat,
            'longitude' => $lon,
            'current'   => 'temperature_2m,relative_humidity_2m,apparent_temperature,weathercode,wind_speed_10m',
            'timezone'  => 'auto',
        ]);

        $c = $res->json('current');

        return [
            'temperature' => $c['temperature_2m'],
            'humidity'    => $c['relative_humidity_2m'],
            'feels_like'  => $c['apparent_temperature'],
            'windspeed'   => $c['wind_speed_10m'],
            'condition'   => $this->conditionCode($c['weathercode']), #use the function
        ];
    }

    # To get the human readable weather condition
    private function conditionCode(int $code): string
{
    return match (true) {
        $code === 0                    => 'Clear',
        in_array($code, [1,2,3], true) => 'Cloudy',
        in_array($code, [61,63,65], true) => 'Rain',
        in_array($code, [80,81,82], true) => 'Rain showers',
        default                       => 'Unknown',
    };
}


// SEARCHING FOR THE CITY
public function getByCity(string $city_name): array
{
    $geo = Http::get('https://geocoding-api.open-meteo.com/v1/search', [
        'name'  => $city_name,
        'count' => 1,
    ])->json('results.0');

    // if it can't find the city
    if (! $geo) {
        throw new \Exception("Could not find coordinates for “{$city_name}”.");
    }

    return $this->getCurrentWeather(
        $geo['latitude'],
        $geo['longitude']
    );
}

}