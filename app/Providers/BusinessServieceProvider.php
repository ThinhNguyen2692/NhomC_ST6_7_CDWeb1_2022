<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Bus\Interface\IBusUser;
use App\Bus\BusUser;

class BusinessServieceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(IBusUser::class, BusUser::class);
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
