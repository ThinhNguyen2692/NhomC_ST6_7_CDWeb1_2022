<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Reposititory\Interface\IReposititory;
use App\Reposititory\Reposititory;
use App\Reposititory\Interface\IUserReposititory;
use App\Reposititory\Interface\IUserProfileReposititory;
use App\Reposititory\Interface\IFeedbackTypeReposititory;
use App\Reposititory\Interface\IUserFeedbackReposititory;
use App\Reposititory\Interface\IFeedbackReposititory;
use App\Reposititory\Interface\IFoodReposititory;
use App\Reposititory\UserReposititory;
use App\Reposititory\UserProfileReposititory;
use App\Reposititory\FeedbackTypeReposititory;
use App\Reposititory\UserFeedbackReposititory;
use App\Reposititory\FeedbackReposititory;
use App\Reposititory\FoodReposititory;



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
        $this->app->singleton(IUserProfileReposititory::class, UserProfileReposititory::class);
        $this->app->singleton(IFeedbackTypeReposititory::class, FeedbackTypeReposititory::class);
        $this->app->singleton(IUserFeedbackReposititory::class, UserFeedbackReposititory::class);
        $this->app->singleton(IFeedbackReposititory::class, FeedbackReposititory::class);
        $this->app->singleton(IFoodReposititory::class, FoodReposititory::class);
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
