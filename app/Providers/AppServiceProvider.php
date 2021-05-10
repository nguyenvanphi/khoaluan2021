<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//fix: Laravel Migration Error: Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes
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
        //fix: Laravel Migration Error: Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes
        Schema::defaultStringLength(191);
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
