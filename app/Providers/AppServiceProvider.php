<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Post\PostRepositoryInterface',
            'App\Repositories\Post\PostRepository'
        );
        $this->app->bind(
            'App\Repositories\User\UserRepositoryInterface',
            'App\Repositories\User\UserRepository'
        );
        $this->app->bind(
            'App\Repositories\Voucher\VoucherRepositoryInterface',
            'App\Repositories\Voucher\VoucherRepository'
        );
        $this->app->bind(
                    'App\Repositories\City\CityRepositoryInterface',
                    'App\Repositories\City\CityRepository'
                );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
