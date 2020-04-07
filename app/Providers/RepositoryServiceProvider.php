<?php

namespace App\Providers;

use App\Repositories\ConfirmationTokenRepository;
use App\Repositories\ConfirmationTokenRepositoryEloquent;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserRepository::class, function (){
            return $this->app->make(UserRepositoryEloquent::class);
        });

        $this->app->bind(ConfirmationTokenRepository::class, function (){
            return $this->app->make(ConfirmationTokenRepositoryEloquent::class);
        });
    }
}
