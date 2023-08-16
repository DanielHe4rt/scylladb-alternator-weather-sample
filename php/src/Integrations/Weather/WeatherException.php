<?php

namespace App\Integrations\Weather;

class WeatherException extends \Exception
{
    public static function notFound(string $city)
    {
        return new self(sprintf('Data related to  "%s" not found.', $city), 404);
    }
}