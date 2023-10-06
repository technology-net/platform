<?php

namespace IBoot\Platform\app\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class PlatformServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'packages/platform');
        $this->loadTranslationsFrom(__DIR__ . '/../../lang', 'packages/platform');

        $this->publishes([
            __DIR__ . '/../../config/platform' => config_path('platform')
        ]);
    }
}
