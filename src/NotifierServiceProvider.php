<?php

namespace Limito\Notifier;

use Illuminate\Support\ServiceProvider;

class NotifierServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/notifier.php', 'notifier'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config' => config_path('limito-notifier'),
        ]);

    }
}
