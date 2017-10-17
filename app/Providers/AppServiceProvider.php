<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\DuskServiceProvider;

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
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
<<<<<<< HEAD
       if ($this->app->environment('local', 'testing')) {
         $this->app->register(DuskServiceProvider::class);
       }
=======
      if ($this->app->environment('local', 'testing')) {
         $this->app->register(DuskServiceProvider::class);
      }
>>>>>>> cae0a375321afff2d8b71c4b6c2d5dc052c4b22a
    }
}
