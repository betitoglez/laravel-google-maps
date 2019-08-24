<?php 

namespace Betitoglez\GoogleMaps\Facades;

use Illuminate\Support\Facades\Facade;

class GoogleMapsFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'GoogleMaps';
    }
}
