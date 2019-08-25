<?php 

namespace Betitoglez\GoogleMaps;

use Betitoglez\GoogleMaps\Exceptions\HttpStatusCodeException;

class GoogleMaps
{

    protected $http;
    public $baseUrl;
    public $geocoding;


    public function __construct()
    {
        $this->http = new \GuzzleHttp\Client();
        $this->geocoding = new Geocoding();
    }


    protected function request (Array $parameters)
    {
        return $this->http->request('GET',$this->baseUrl,['query'=>$parameters,'key'=>config('googlemaps.google_maps_key')]);
    }

    protected function response (Psr\Http\Message\ResponseInterface $response){

        if (!$response->isSuccessful()){
            throw new HttpStatusCodeException($response->getReasonPhrase(),$response->getStatusCode());
        }

        return $response->json();
    }
}
