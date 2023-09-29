<?php

namespace IBoot\Platform;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
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
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'packages/platform');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadTranslationsFrom(__DIR__ . '/lang', 'packages/platform');
        $this->mergeConfigFrom(
            __DIR__ . '/config/user.php',
            'user'
        );
        $this->publishes([
            __DIR__ . '/config/user.php' => config_path('user.php'),
            __DIR__ . '/resources/views' => resource_path('views/users'),
            __DIR__ . '/resources/js' => public_path('iboot/platform/js'),
            __DIR__ . '/resources/css' => public_path('iboot/platform/css'),
        ]);
    }
}
