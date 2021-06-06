<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Route;

/**
 * Class PurchaseServiceProvider
 * @package App
 */
class PurchaseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishConfig();
        }

        $this->bootRoutes();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/purchase.php', 'purchase');
        $this->app->register(EventServiceProvider::class);

        $this->app->bind('product', function () {
            return new Product();
        });

        $this->app->bind('subscription', function () {
            return new Subscription();
        });
    }

    /**
     * boots routes
     */
    public function bootRoutes(): void
    {
        Route::group($this->routeConfig(), function () {
            $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        });
    }

    /**
     * publish configurations
     */
    public function publishConfig(): void
    {
        $paths = [__DIR__ . '/../config/purchase.php' => config_path('purchase.php')];
        $this->publishes($paths, 'config');
    }

    /**
     * @return array
     */
    public function routeConfig(): array
    {
        return config('purchase.routing');
    }
}
