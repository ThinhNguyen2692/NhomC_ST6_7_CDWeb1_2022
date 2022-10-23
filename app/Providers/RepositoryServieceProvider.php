<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Reposititory\Interface\IReposititory;
use App\Reposititory\Reposititory;
use App\Reposititory\Interface\IUserReposititory;
use App\Reposititory\UserReposititory;

class RepositoryServieceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(IReposititory::class, Reposititory::class);
        $this->app->singleton(IUserReposititory::class, UserReposititory::class);
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
