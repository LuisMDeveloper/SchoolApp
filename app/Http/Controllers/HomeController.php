<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->user()->can('isRole', 'App\Admin')) {
            return view('dashboard.home');
        } else if($request->user()->can('isRole', 'App\Maestro')) {
            return view('home');
        } else if($request->user()->can('isRole', 'App\Alumno')) {
            $alumno = $request->user()->loggable;
            //return dd($alumno->grupo()->get()[0]->cursos()->get());
            return view('home', compact('alumno'));
        }

        return view('home');
    }
}
