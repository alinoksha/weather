<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class WeatherService
{
    public function getByLocation(array $location, string $units, string $lang): array
    {
        $key = $location['lat'] . '-' . $location['lon'];
        $cache = Cache::get($key);
        if (!empty($cache)) {
            return $cache;
        }

        $response = Http::get('https://api.openweathermap.org/data/2.5/onecall', [
            'lat' => $location['lat'],
            'lon' => $location['lon'],
            'units' => $units,
            'exclude' => 'daily,minutely',
            'lang' => $lang,
            'appid' => env('OPENWEATHER_APPID')
        ])->json();

        $cache = [
            'temp' => $response['current']['temp'],
            'pressure' => $response['current']['pressure'],
            'wind_speed' => $response['current']['wind_speed'],
            'wind_deg' => $response['current']['wind_deg'],
            'humidity' => $response['current']['humidity'],
            'precipication' => $response['hourly'][0]['pop'],
            'descr' => $response['current']['weather'][0]['description'],
            'icon' => $response['current']['weather'][0]['icon']
        ];

        Cache::add($key, $cache, 60);
        return $cache;
    }
}
