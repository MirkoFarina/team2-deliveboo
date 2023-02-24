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
                    'environment'   => 'sandbox',
                    'merchantId'    => '6x2mwk59hr8fp29k',
                    'publicKey'     => 'p3skmsj7y8xcgc3j',
                    'privateKey'    => '667b82a499c0727bdceaa926d54e9f0e'
                ]
            );
        });
    }
}
