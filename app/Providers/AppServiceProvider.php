<?php

namespace App\Providers;

use App\Alumno;
use App\Grupo;
use App\Materia;
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

        $gruposCount = Grupo::all()->count();
        view()->share('gruposCount', $gruposCount);

        $materiasCount = Materia::all()->count();
        view()->share('materiasCount', $materiasCount);
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
