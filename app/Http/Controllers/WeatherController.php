<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WeatherApiService;

class WeatherController extends Controller
{

    public function index(Request $request, WeatherApiService $svc)
    {
        $city = $request->query('city', 'New York');  //DEFAULT
        $unit = $request->query('unit', 'F');

        try {
            $weather = $svc->getByCity($city);
            $error   = null;
        } catch (\Exception $e) {
            $weather = null;
            $error   = $e->getMessage();
        }

        if (isset($weather) && $unit === 'F') {
            $weather['temperature'] = round($weather['temperature'] * 9/5 + 32);
            $weather['feels_like']  = round($weather['feels_like']  * 9/5 + 32);
        }

        return view('welcome', compact('weather', 'city', 'unit', 'error'));
    }
}
