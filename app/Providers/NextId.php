<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class NextId extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('EprvId', function ($app) {
            $lastId = $app['db']->table('eprouvettes')->max('epr_id');
            return $lastId + 1;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
