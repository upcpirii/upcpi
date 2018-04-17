<?php

namespace UPCEngineering\Providers;

use Illuminate\Support\ServiceProvider;
use UPCEngineering\Overrides\SimpleSoftwareIO\QrCode\BaconQrCodeGenerator;

class QrCodeServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->bind('qrcode', function () {
            return new BaconQrCodeGenerator();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['qrcode'];
    }
}
