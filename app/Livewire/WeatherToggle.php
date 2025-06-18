<?php
/*
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
        $this->loadWeather($svc);
    }

    public function updatedCity()    { $this->loadWeather($svc); }
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
}*/


namespace App\Livewire;

use Livewire\Component;
use App\Services\WeatherApiService;

class WeatherToggle extends Component
{
    public $city    = 'New York';
    public $unit    = 'C';
    public $weather = [];
    public $error   = null;

    public function mount()
    {
        $this->loadWeather();
    }

    public function updatedCity()
    {
        $this->loadWeather();
    }

    public function updatedUnit()
    {
        // conversion is done in Blade
    }

    public function loadWeather()
    {
        // pull the service on demand
        $svc = app(WeatherApiService::class);

        try {
            $this->weather = $svc->getByCity($this->city);
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