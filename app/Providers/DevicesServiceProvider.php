<?php

namespace App\Providers;
use App\Models\Device;
use Illuminate\Support\ServiceProvider;

class DevicesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
    //
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->bind('store.device', \App\Http\Middleware\StoreDevice::class);

    }
}
