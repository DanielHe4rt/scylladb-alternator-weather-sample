<?php

namespace App\Commands;

use App\Integrations\Weather\WeatherClientContract;
use App\Weather\WeatherRepository;

class DeleteByCityCommand implements CommandInterface
{

    public function run(WeatherRepository $repository, WeatherClientContract $client): CommandResponseEnum
    {
        $cityName = trim(fgets(STDIN));

        $repository->delete($cityName);

        return CommandResponseEnum::SUCCESS;
    }
}