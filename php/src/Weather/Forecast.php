<?php

namespace App\Weather;

class Forecast implements \JsonSerializable
{
    public function __construct(
        public readonly string                 $date,
        public readonly Temperature            $temperature,
        public readonly WeatherDescriptionEnum $descriptionEnum,
        public readonly float                    $ultraVioletIndex,
    )
    {
    }

    public static function factory(array $forecast): self
    {
        return new self(
            date: $forecast['day'],
            temperature: Temperature::make($forecast['temperature']),
            descriptionEnum: WeatherDescriptionEnum::from($forecast['climate_description']),
            ultraVioletIndex: $forecast['ultra_violet_index']
        );
    }

    public function jsonSerialize(): array
    {
        return [
            'temperature' => $this->temperature->jsonSerialize(),
            'description' => $this->descriptionEnum->getDescription()['description'],
            'ultra_violet_index' => $this->ultraVioletIndex,
        ];
    }
}