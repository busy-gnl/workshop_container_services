<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class PriceConverter
{

    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function convertEurToDollar(float $euroPrice): float
    {
        $response = $this->client->request(
            'GET',
            'https://v6.exchangerate-api.com/v6/42050f7268f7b98e62789a03/pair/EUR/USD/' . $euroPrice
        );
        $content = $response->toArray();


        return $content['conversion_result'];
    }
    public function convertEurToYen(float $euroPrice): float
    {
        $response = $this->client->request(
            'GET',
            'https://v6.exchangerate-api.com/v6/42050f7268f7b98e62789a03/pair/EUR/JPY/' . $euroPrice
        );
        $content = $response->toArray();

        return $content['conversion_result'];
    }
}
