<?php

namespace App\Commands;

use App\Integrations\Weather\WeatherClientContract;
use App\Weather\WeatherRepository;
use Exception;

class PopulateByCapitalsCommand implements CommandInterface
{
    public function run(WeatherRepository $repository, WeatherClientContract $client): CommandResponseEnum
    {
        foreach (range(220, 246) as $cityId) {
            try {
                $response = $client->fetchLastWeekByCity($cityId);
            } catch (Exception $exception) {
                continue;
            }

            echo sprintf(
                " > Capital: %s (%s) - forecast added." . PHP_EOL,
                $response->weather()->cityName,
                $cityId,
            );

            $repository->create($response->weather());
        }

        return CommandResponseEnum::SUCCESS;
    }
}