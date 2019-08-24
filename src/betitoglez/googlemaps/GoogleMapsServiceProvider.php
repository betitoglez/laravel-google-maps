<?php 

namespace Betitoglez\GoogleMaps;

use Illuminate\Support\ServiceProvider;

class GoogleMapsServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/Publishes/config/googlemaps.php' => config_path('googlemaps.php')
        ], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('GoogleMaps', function ($app) {
            return new GoogleMaps();
        });

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('GoogleMaps');
    }
}
