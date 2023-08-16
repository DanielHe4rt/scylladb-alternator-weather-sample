<?php

namespace App\Integrations\Weather;

use App\Weather\Weather;

class WeatherTransformer
{
    /**
     * @param array $payload
     * @return Weather<>
     */
    public static function transform(mixed $payload): array
    {

        $transformed = [
            'city' => $payload['nome'],
            'query-ts' => strtotime($payload['atualizacao']),
            'forecasts' => []
        ];

        foreach ($payload['previsao'] as $rawForecast) {
            $rawForecast = (array)$rawForecast;
            $transformed['forecasts'][] = [
                'day' => strtotime($rawForecast['dia']),
                'climate_description' => $rawForecast['tempo'],
                'temperature' => [
                    'min_temperature' => (float)$rawForecast['minima'],
                    'max_temperature' => (float)$rawForecast['maxima'],
                    'avg_temperature' => (((float)$rawForecast['maxima'] + (float)$rawForecast['minima']) / 2),
                ],
                'ultra_violet_index' => (float)$rawForecast['iuv']
            ];

        }

        return $transformed;
    }
}