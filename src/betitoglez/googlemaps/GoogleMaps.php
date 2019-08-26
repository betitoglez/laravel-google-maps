<?php

namespace Betitoglez\GoogleMaps;

use Betitoglez\GoogleMaps\Exceptions\GoogleMapsException;
use Betitoglez\GoogleMaps\Exceptions\HttpStatusCodeException;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class GoogleMaps
{

    protected $http;
    public $baseUrl;
    public $geocoding;


    public function __construct()
    {
        $this->http = new Client();
    }

    protected function beforeRequest(Array $parameters)
    {

    }

    protected function afterRequest(Response $response)
    {

    }

    public function geocoding()
    {
        return new Geocoding();
    }

    public function test()
    {
        return "Test OK";
    }

    protected function request(Array $parameters)
    {
        return $this->http->request('GET', $this->baseUrl . '?' . http_build_query(array_merge(
                [
                    'key' => config('googlemaps.google_maps_key'),
                    'language' => config('googlemaps.default_language'),
                    'region' => config('googlemaps.default_region'),
                ],
                $parameters)));
    }

    protected function response(Response $response)
    {

        if ($response->getStatusCode() !== 200) {
            throw new HttpStatusCodeException($response->getReasonPhrase(), $response->getStatusCode());
        }
        $parsedResponse = json_decode($response->getBody(), TRUE);

        if ($parsedResponse['status'] !== 'OK') {
            throw new GoogleMapsException($parsedResponse['error_message']);
        }
        return $parsedResponse;
    }
}
