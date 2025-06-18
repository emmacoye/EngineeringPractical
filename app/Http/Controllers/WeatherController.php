<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WeatherApiService;

class WeatherController extends Controller
{

    public function index(Request $request, WeatherApiService $svc)
    {
        $city = $request->query('city', 'New York');  //DEFAULT

        try {
            $weather = $svc->getByCity($city);
            $error   = null;
        } catch (\Exception $e) {
            $weather = null;
            $error   = $e->getMessage();
        }

        return view('welcome', compact('weather', 'city', 'error'));
    }
}
