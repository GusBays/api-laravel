<?php

namespace App\Services\ChuckNorris;

use App\Services\BaseService;
use GuzzleHttp\Client;

class ChuckNorrisService extends BaseService
{
    private string $baseUri = 'https://api.chucknorris.io/jokes/random';
    private Client $client;

    public function __construct()
    {
    }

    public function getJoke() 
    {
        $this->client = $this->getClient();
        
        try {
            $response = $this->client->request('GET');
        } catch (\Exception $e) {
            dump($e->getMessage());
        }

        $json = self::formatJsonResponse($response->getBody()->getContents());
        return self::toArray($json);
    }

    private function getClient(): Client
    {
        return new Client(
            [
                'base_uri' => $this->baseUri,
            ]
        );
    }

    private static function formatJsonResponse($response): object
    {
        return json_decode($response);
    }

    private static function toArray($response): array
    {
        return [
            "value" => $response->value ?? null,
        ];
    }
}