<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class LocationService
{
    public function getByCoords(string $lat, string $lon, string $lang): array
    {
        $response = Http::get('http://api.openweathermap.org/geo/1.0/reverse', [
            'lat' => $lat,
            'lon' => $lon,
            'limit' => 1,
            'appid' => env('OPENWEATHER_APPID')
        ])->json();

        return [
            'name' => $response[0]['local_names'][$lang] ?? $response[0]['name'] ?? 'Unknown',
            'lat' => $response[0]['lat'] ?? $lat,
            'lon' => $response[0]['lon'] ?? $lon
        ];
    }

    public function getByName(string $name, string $lang): array
    {
        $response = Http::get('http://api.openweathermap.org/geo/1.0/direct', [
            'q' => $name,
            'limit' => 1,
            'appid' => env('OPENWEATHER_APPID')
        ])->json();

        return [
            'name' => $response[0]['local_names'][$lang] ?? $response[0]['name'] ?? 'Unknown',
            'lat' => $response[0]['lat'] ?? 0,
            'lon' => $response[0]['lon'] ?? 0
        ];
    }
}
