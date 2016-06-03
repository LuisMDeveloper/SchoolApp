<?php

namespace App\Providers;

use App\Alumno;
use App\Curso;
use App\Grupo;
use App\Maestro;
use App\Materia;
use App\User;
use App\Grade;
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

        $maestrosCount = Maestro::all()->count();
        view()->share('maestrosCount', $maestrosCount);

        $cursosCount = Curso::all()->count();
        view()->share('cursosCount', $cursosCount);

        $gradesCount = Grade::all()->count();
        view()->share('gradesCount', $gradesCount);
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
