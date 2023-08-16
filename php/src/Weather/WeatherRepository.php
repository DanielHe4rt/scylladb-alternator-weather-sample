<?php

namespace App\Weather;

use App\Migration;
use Aws\DynamoDb\DynamoDbClient;
use GuzzleHttp\Promise\Promise;

class WeatherRepository
{
    public function __construct(private readonly DynamoDbClient $client)
    {
    }

    public function create(Weather $weather): void
    {
        $batch = [];

        /** @var Forecast $forecast */
        foreach ($weather->forecastCollection as $forecast) {
            $batch[] = [
                'PutRequest' => [
                    'Item' => [
                        'city_name' => ['S' => $weather->cityName],
                        'ts' => ['S' => date('Y-m-d', $forecast->date)],
                        'temperature' => ['M' => [
                            'mininum' => ['N' => $forecast->temperature->low],
                            'maximum' => ['N' => $forecast->temperature->high],
                            'average' => ['N' => $forecast->temperature->average],
                        ]],
                        'uvi' => ['N' => (string) $forecast->ultraVioletIndex],
                        'climate_conditions' => ['S' => $forecast->descriptionEnum->getDescription()['description']]
                    ]
                ]
            ];
        }
        $this->client->batchWriteItem([
            'RequestItems' => [
                Migration::$tableName => $batch
            ]
        ]);

    }

    public function getByCity(string $cityName, string $date): array
    {
        $todayDate = date('Y-m-d');
        $upcomingDate = date('Y-m-d', strtotime($todayDate . ' +7 days'));
        $response = $this->client->query([
            'TableName' => Migration::$tableName,
            'KeyConditionExpression' => 'city_name = :partitionValue AND ts BETWEEN :startSortValue AND :endSortValue',
            'ExpressionAttributeValues' => [
                ':partitionValue' => ['S' => $cityName],
                ':startSortValue' => ['S' => $todayDate],
                ':endSortValue' => ['S' => $upcomingDate]
            ]
        ]);

        if (!array_key_exists('Items', $response->toArray())) {
            throw new \Exception('Not found');
        }

        return $response['Items'];

    }
}