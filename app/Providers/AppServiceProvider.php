<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Pagination\Paginator;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        $this->app->singleton(Gateway::class, function($app){
            return new Gateway(
                [
                    'environment'   => env('BTREE_ENVIRONMENT'),
                    'merchantId'    => env('BTREE_MERCHANT_ID'),
                    'publicKey'     => env('BTREE_PUBLIC_KEY'),
                    'privateKey'    => env('BTREE_PRIVATE_KEY')
                ]
            );
        });
    }
}
