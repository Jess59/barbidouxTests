<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiService
{
    private $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function fetchData(string $url): array
    {
        $response = $this->httpClient->request('GET', $url);

        if ($response->getStatusCode() !== 200) {
            throw new \Exception('API request failed');
        }

        return $response->toArray();
    }

    public function postData(string $url, array $data): array
    {
        $response = $this->httpClient->request('POST', $url, [
            'json' => $data,
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new \Exception('API request failed');
        }

        return $response->toArray();
    }
}