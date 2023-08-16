<?php

namespace App\Commands;

use App\Integrations\Weather\WeatherClientContract;
use App\Weather\WeatherRepository;

class FindForecastByCityCommand implements CommandInterface
{

    public function __construct()
    {
    }

    public function run(
        WeatherRepository $repository,
        WeatherClientContract $client
    ): CommandResponseEnum
    {
        echo "Which Brazilian city you want to lookup? Ex: Rio de Janeiro" . PHP_EOL . " > ";
        $cityName = trim(fgets(STDIN));

        echo "Select an date between the 7 upcoming days. Format: " . date('Y-m-d') . PHP_EOL . " > ";
        $date = trim(fgets(STDIN));

        $forecasts = $repository->getByCity($cityName, $date);
        var_dump($forecasts);

        return CommandResponseEnum::SUCCESS;
    }
}