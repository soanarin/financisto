<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

//sov
use Illuminate\Support\Facades\Schema;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        //sov modify because of error
         Schema::defaultStringLength(191);

         //sov make variables available for all views
         //sov make a list of categories
         // $yt='LLL';
         // view()->share('sovvariable',$yt);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
