<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Bus\Interface\IBusUser;
use App\Bus\Interface\IBusFeedback;
use App\Bus\BusUser;
use App\Bus\BusFeedback;

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
        $this->app->singleton(IBusFeedback::class, BusFeedback::class);
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
