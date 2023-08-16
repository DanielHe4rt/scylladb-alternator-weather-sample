<?php

namespace App\Integrations\Weather;

use App\Integrations\IntegrationException;
use App\Weather\Weather;
use ArrayIterator;
use JsonSerializable;

class WeatherResponse extends ArrayIterator implements JsonSerializable
{

    public static function factory(array $rawWeathers): self
    {

        $response = new self();
        $transformedWeathers = WeatherTransformer::transform($rawWeathers);

        $response->append(Weather::make($transformedWeathers));

        return $response;
    }

    public function weather(): Weather
    {
        return $this[0];
    }

    public function jsonSerialize(): array
    {
        /** @var Weather $weather */
        $weather = $this->getArrayCopy()[0];
        return [
            'weather' => $weather->jsonSerialize(),
        ];
    }
}