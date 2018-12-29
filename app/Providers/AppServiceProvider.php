<?php

namespace App\Providers;

<<<<<<< HEAD
use Illuminate\Support\Facades\Schema;
=======
use Illuminate\Support\Collection;
>>>>>>> 9c52e3394381415a33cbc82de630019512a33b42
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
<<<<<<< HEAD
        Schema::defaultStringLength(191);
=======
        //
        //array transpose method
        Collection::macro('transpose', function () {
            $items = array_map(function (...$items) {
                return $items;
            }, ...$this->values());

            return new static($items);
        });
>>>>>>> 9c52e3394381415a33cbc82de630019512a33b42
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
