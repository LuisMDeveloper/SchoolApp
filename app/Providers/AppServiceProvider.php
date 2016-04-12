<?php

namespace App\Providers;

use App\Alumno;
use App\User;
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
        $usersCount = User::all()->count();
        view()->share('usersCount', $usersCount);

        $alumnosCount = Alumno::all()->count();
        view()->share('alumnosCount', $alumnosCount);
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
