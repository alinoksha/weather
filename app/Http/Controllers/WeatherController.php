<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestWeatherByCoords;
use App\Http\Requests\RequestWeatherByLocation;
use App\Services\LocationService;
use App\Services\WeatherService;

class WeatherController extends Controller
{
    private WeatherService $weatherService;
    private LocationService $locationService;

    public function __construct(WeatherService $weatherService, LocationService $locationService)
    {
        $this->weatherService = $weatherService;
        $this->locationService = $locationService;
    }

    public function byCoords(RequestWeatherByCoords $request)
    {
        $data = $request->validated();
        $location = $this->locationService->getByCoords($data['lat'], $data['lon'], $data['lang'] ?? 'ru');
        $weather = $this->weatherService->getByLocation($location, $data['units'] ?? 'metric', $data['lang'] ?? 'ru');
        return [
            'weather' => $weather,
            'location' => $location
        ];
    }

    public function byLocation(RequestWeatherByLocation $request)
    {
        $data = $request->validated();
        $location = $this->locationService->getByName($data['name'], $data['lang'] ?? 'ru');
        $weather = $this->weatherService->getByLocation($location, $data['units'] ?? 'metric', $data['lang'] ?? 'ru');
        return [
            'weather' => $weather,
            'location' => $location
        ];
    }
}
