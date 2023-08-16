<?php

namespace App;

use Aws\DynamoDb\DynamoDbClient;

class Migration
{
    public static string $tableName = 'weather';

    public function __construct(private readonly DynamoDbClient $client)
    {
    }

    public static function factory(DynamoDbClient $client): self
    {
        return new self($client);
    }

    public function setup(): void
    {
        $availableTableNames = $this->client->listTables()->toArray()['TableNames'];

        if (in_array(self::$tableName, $availableTableNames)) {
            return;
        }

        $this->client->createTable($this->tableSchemaDefinition());
    }

    private function tableSchemaDefinition(): array
    {
        return [
            'TableName' => self::$tableName,
            'KeySchema' => [
                ['AttributeName' => 'city_name', 'KeyType' => 'HASH'],
                ['AttributeName' => 'ts', 'KeyType' => 'RANGE'],
            ],
            'AttributeDefinitions' => [
                ['AttributeName' => 'city_name', 'AttributeType' => 'S'],
                ['AttributeName' => 'ts', 'AttributeType' => 'S'],
                ['AttributeName' => 'temperature', 'AttributeType' => 'M'],
                ['AttributeName' => 'ivu', 'AttributeType' => 'N'],
                ['AttributeName' => 'climate_conditions', 'AttributeType' => 'S'],

            ],
            'ProvisionedThroughput' => [
                'ReadCapacityUnits' => 10,
                'WriteCapacityUnits' => 10
            ]
        ];
    }
}