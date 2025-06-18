<?php

namespace App\Livewire;

use Livewire\Component;

class WeatherToggle extends Component
{
    public $city       = 'New York';
    public $unit       = 'C';
    public $weather    = [];
    public $error      = null;

    protected WeatherApiService $svc;

    public function mount(WeatherApiService $svc)
    {
        $this->svc = $svc;
        $this->loadWeather();
    }

    public function updatedCity()    { $this->loadWeather(); }
    public function updatedUnit()    { /* no extra work—view will re-render with new unit */ }

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
