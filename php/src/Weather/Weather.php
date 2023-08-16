<?php

namespace App\Weather;

class Weather implements \JsonSerializable
{
    public function __construct(
        public readonly string             $cityName,
        public readonly int                $timestamp,
        public readonly ForecastCollection $forecastCollection
    )
    {
    }

    public static function make(array $weatherPayload): self
    {

        return new self(
            $weatherPayload['city'],
            $weatherPayload['query-ts'],
            ForecastCollection::make($weatherPayload['forecasts'])
        );
    }

    public function jsonSerialize(): array
    {
        return [
            'city' => $this->cityName,
            'query-date' => date('Y-m-d', $this->timestamp),
            'forecasts' => $this->forecastCollection->jsonSerialize()
        ];
    }
}