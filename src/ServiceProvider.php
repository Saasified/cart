<?php

namespace Saasify\Cart;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    const CONFIG_PATH = __DIR__.'/../config/cart.php';

    const MIGRATIONS_PATH = __DIR__.'/../migrations/';

    public function boot()
    {
        $this->publishes([
            self::CONFIG_PATH => config_path('cart.php'),
        ], 'config');

        $this->publishes([
            self::MIGRATIONS_PATH => database_path('migrations'),
        ], 'migrations');

        $this->loadMigrationsFrom(self::MIGRATIONS_PATH);
    }

    public function register()
    {
        $this->mergeConfigFrom(self::CONFIG_PATH, 'cart');

        $this->app->bind('cart', function () {
            return new Cart(
                $this->app->make(
                    $this->app['config']->get('cart.repository')
                )
            );
        });
    }
}
