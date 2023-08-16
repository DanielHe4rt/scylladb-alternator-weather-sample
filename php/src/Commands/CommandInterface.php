<?php

namespace App\Commands;

use App\Integrations\Weather\WeatherClientContract;
use App\Weather\WeatherRepository;

interface CommandInterface
{
    public function run(
        WeatherRepository     $repository,
        WeatherClientContract $client
    ): CommandResponseEnum;
}