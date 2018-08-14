<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

use App\District;
use App\Divisions;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        //its just a dummy data object.
        $districts_item = District::all();
        $divisions_item = Divisions::all();
        // Sharing is caring
        View::share('districts_item', $districts_item);
        View::share('divisions_item', $divisions_item);

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
