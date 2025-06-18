{{-- resources/views/livewire/weather-toggle.blade.php --}}
<div class="flex flex-col items-center space-y-6">
<h2 class="text-xl self-start mb-2"><strong>Check weather for...</strong></h2>
<!--FIND CITY-->
  <div class="flex self-start">
    <input
      wire:model.lazy="city"
      type="text"
      placeholder="Enter city"
      class="border rounded-l px-4 py-2 w-64 h-10 focus:outline-none"
    />
    <button
      wire:click="loadWeather"
      class="bg-blue-600 text-white px-4 py-2 rounded-r hover:bg-blue-700"
    >Search</button>
  </div>

  <!--UNITS-->
  <div class="flex gap-4 self-end">
    <button
      wire:click="$set('unit','C')"
      class="rounded-full px-4 py-2
             {{ $unit==='C' ? 'bg-blue-700 text-white' : 'bg-blue-300 text-black' }}
             hover:bg-blue-700 hover:text-white"
    >°C</button>

    <button
      wire:click="$set('unit','F')"
      class="rounded-full px-4 py-2
             {{ $unit==='F' ? 'bg-blue-700 text-white' : 'bg-blue-300 text-black' }}
             hover:bg-blue-700 hover:text-white"
    >°F</button>
  </div>

  <!--WEATHER MESSAGE-->
  @if($error)
    <p class="text-red-600 text-center mb-4">{{ $error }}</p>
  @elseif(!empty($weather))
    @php
      $temp = $weather['temperature'];
      $feel = $weather['feels_like'];
      if ($unit==='F') {
        $temp = round($temp * 9/5 + 32);
        $feel = round($feel * 9/5 + 32);
      }
    @endphp
        <div class="bg-white shadow-lg rounded-lg w-full overflow-hidden">
            <div class="p-6">
                <h1 class="text-2xl font-bold mb-4">{{ ucwords($city) }}</h1>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Weather Details -->
                    <div class="flex items-center space-x-4">
                        <div class="text-5xl font-bold">{{ $temp }}&deg;{{$unit}}</div>
                        <div class="text-xl self-end">{{ $weather['condition'] }}</div>
                    </div>
                   
                    <div class="space-y-2">
                        <p><span class="font-semibold">Humidity: </span> {{$weather['humidity']}}%</p>
                        <p><span class="font-semibold">Wind Speed:</span> {{$weather['windspeed']}} km/h</p>
                        <p><span class="font-semibold">Feels Like:</span> {{$feel}}&deg;{{$unit}}</p>
                    </div>
                </div>
            </div>
        </div>
        @endif
</div>

