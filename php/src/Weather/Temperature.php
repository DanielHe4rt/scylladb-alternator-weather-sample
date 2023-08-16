<?php

namespace App\Weather;

class Temperature implements \JsonSerializable
{
    public function __construct(
        public readonly float $high,
        public readonly float $low,
        public readonly float $average,
    )
    {
    }

    public static function make(array $payload): self
    {
        return new self(
            $payload['min_temperature'],
            $payload['max_temperature'],
            $payload['avg_temperature'],
        );
    }


    public function jsonSerialize(): array
    {
        return [
            'min_temperature' => $this->low,
            'max_temperature' => $this->high,
            'avg_temperature' => $this->average
        ];
    }
}