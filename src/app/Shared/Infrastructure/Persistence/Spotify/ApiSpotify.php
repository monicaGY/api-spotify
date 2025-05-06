<?php

namespace Shared\Infrastructure\Persistence\Spotify;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use RuntimeException;

class ApiSpotify
{
    private Client $client;
    private array $headers;
    private string $baseUrl = 'https://api.spotify.com/v1/';
    public function __construct()
    {
        $this->client = new Client();
        $this->headers = [
            'Authorization' => 'Bearer ' . $this->getToken(),
        ];
    }

    protected function request($method, $request)
    {
        try{
            $options = [
                'headers' => $this->headers,
            ];

            $response = $this->client->request($method, $this->baseUrl.$request, $options);
            return json_decode($response->getBody()->getContents(), true);

        }catch (GuzzleException $e){
            throw new RuntimeException($e->getMessage());
        }
    }
    private function getToken(): string
    {
        try{
            $options = [
                'headers' => [
                    'Authorization' => 'Basic ' . base64_encode(env('SPOTIFY_CLIENT_ID') . ':' . env('SPOTIFY_CLIENT_SECRET')),
                    'Content-Type' => 'application/x-www-form-urlencoded',

                ],
                'form_params' => [
                    'grant_type' => 'client_credentials',
                ]
            ];

            $response = $this->client->request(
                'POST',
                'https://accounts.spotify.com/api/token',
                $options
            );
            $response = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

            return $response['access_token'];

        }catch (Exception|GuzzleException $e){
            throw new RuntimeException($e->getMessage());
        }
    }

}
