<?php

namespace App;

use App\Commands\CommandException;
use App\Commands\CommandInterface;
use App\Commands\CommandResponseEnum;
use App\Commands\DeleteByCityCommand;
use App\Commands\FindForecastByCityCommand;
use App\Commands\PopulateByCapitalsCommand;
use App\Integrations\IntegrationException;
use App\Integrations\Weather\Cptec\WeatherCptecClient;
use App\Integrations\Weather\WeatherClientContract;
use App\Weather\WeatherRepository;
use Aws\DynamoDb\DynamoDbClient;
use GuzzleHttp\Client;

class App
{
    public function run(): void
    {
        $alternatorClient = new DynamoDbClient([
            'endpoint' => 'http://localhost:8000', // ScyllaDB LocalHost URL
            'credentials' => ['key' => 'None', 'secret' => 'None'],
            'region' => 'None'
        ]);
        Migration::factory($alternatorClient)->setup();

        $weatherRepository = new WeatherRepository($alternatorClient);
        $weatherClient = $this->getWeatherClient('cptec');

        while (true) {
            $commandName = $this->input();
            try {
                $commandResponse = $this->getCommand($commandName)
                    ->run($weatherRepository, $weatherClient);
            } catch (CommandException $e) {

            }

        }


        //$weatherRepository->create($weatherResponse->weather());
    }

    public function getCommand(string $commandName): CommandInterface
    {
        return match ($commandName) {
            '!populate' => new PopulateByCapitalsCommand(),
            '!lookup' => new FindForecastByCityCommand(),
            '!delete' => new DeleteByCityCommand(),
            default => throw CommandException::notImplemented($commandName)
        };
    }

    private function getWeatherClient(string $clientName): WeatherClientContract
    {
        return match ($clientName) {
            'cptec' => new WeatherCptecClient(new Client()),
            default => throw IntegrationException::notImplemented($clientName),
        };
    }

    private function input(): string
    {
        echo "User: ";
        return trim(fgets(STDIN));
    }
}