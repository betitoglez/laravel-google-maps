<?php
/**
 * Created by PhpStorm.
 * User: betit
 * Date: 25/08/2019
 * Time: 18:26
 */

namespace Betitoglez\GoogleMaps;


class Geocoding extends GoogleMaps
{

    public function __construct()
    {
        $this->baseUrl = "https://maps.googleapis.com/maps/api/geocode/json";
        parent::__construct();
    }

    public function getLatLong ($address,$additionalParameters=[]){
        $response = $this->request(array_merge(['address'=>$address],$additionalParameters));
        return $this->response($response);
    }

    public function getLatLongByComponents ($components,$additionalParameters=[]){
        $response = $this->request(array_merge(['components'=>$components],$additionalParameters));
        return $this->response($response);
    }


}