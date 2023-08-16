<?php

namespace App\Weather;

use ArrayIterator;

class ForecastCollection extends ArrayIterator implements \JsonSerializable
{

    public static function make(array $forecasts): self
    {
        $forecastsCollection = new self();

        foreach ($forecasts as $forecast) {
            $forecastsCollection->append(Forecast::factory($forecast));
        }
        return $forecastsCollection;
    }

    public function jsonSerialize(): mixed
    {
        $response = [];
        /** @var Forecast $forecast */
        foreach($this as $forecast) {
            $response[] = $forecast->jsonSerialize();
        }
        return $response;
    }
}