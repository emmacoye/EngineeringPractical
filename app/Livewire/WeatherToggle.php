<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\WeatherApiService;

class WeatherToggle extends Component
{
    public $city       = 'New York';
    public $unit       = 'C';
    public $weather    = [];
    public $error      = null;

    protected $svc;

    public function mount(WeatherApiService $svc)
    {
        $this->svc = $svc;
        $this->loadWeather();
    }

    public function updatedCity()    { $this->loadWeather(); }
    public function updatedUnit()    { }

    private function loadWeather()
    {
        try {
            $this->weather = $this->svc->getByCity($this->city);
            $this->error   = null;
        } catch (\Exception $e) {
            $this->weather = [];
            $this->error   = $e->getMessage();
        }
    }

    public function render()
    {
        return view('livewire.weather-toggle');
    }
}
