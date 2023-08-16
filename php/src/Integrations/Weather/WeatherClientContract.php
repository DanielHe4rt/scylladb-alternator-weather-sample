<?php

namespace App\Integrations\Weather;

interface WeatherClientContract
{
    public function fetchLastWeekByCity(int $cityId): WeatherResponse;
}