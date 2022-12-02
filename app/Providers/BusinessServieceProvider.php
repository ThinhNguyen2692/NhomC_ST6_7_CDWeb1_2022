<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Bus\Interface\IBusUser;
use App\Bus\Interface\IBusFeedback;
use App\Bus\Interface\IBusLogin;
use App\Bus\Interface\IBusFood;
use App\Bus\BusUser;
use App\Bus\BusFeedback;
use App\Bus\BusFood;

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
        $this->app->singleton(IBusLogin::class, BusLogin::class);
        $this->app->singleton(IBusFood::class, BusFood::class);
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
