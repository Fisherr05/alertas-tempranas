<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;

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
        $this->register();

        \Gate::define('1', function ($user) {
            if ($user->fullacces == 'yes') {
                return true;
            }
            return false;
        });

        \Gate::define('2', function ($user) {
            if ($user->fullacces == 'no') {
                return true;
            }
            return false;
        });
        \Gate::define('3', function ($user) {
            if ($user->fullacces == 'revisor') {
                return true;
            }
            return false;
        });
    }
}
