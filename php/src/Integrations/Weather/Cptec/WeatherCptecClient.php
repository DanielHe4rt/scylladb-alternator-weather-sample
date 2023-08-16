<?php

namespace App\Integrations\Weather\Cptec;

use App\Integrations\Weather\WeatherClientContract;
use App\Integrations\Weather\WeatherException;
use App\Integrations\Weather\WeatherResponse;
use App\Integrations\Weather\WeatherTransformer;

class WeatherCptecClient implements WeatherClientContract
{
    private string $endpointUrl = 'http://servicos.cptec.inpe.br/XML/';
    private string $source = 'CPTEC/INPE';

    public function __construct()
    {
    }

    public function fetchLastWeekByCity(int $cityId): WeatherResponse
    {
        $endpoint = sprintf(
            '%s/cidade/7dias/%s/previsao.xml',
            $this->endpointUrl,
            $cityId
        );

        $response = (array)simplexml_load_file($endpoint);

        if ($response['nome'] == 'null') {
            throw WeatherException::notFound($cityId);
        }


        return WeatherResponse::factory($response);
    }

}