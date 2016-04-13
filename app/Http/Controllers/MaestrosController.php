<?php

namespace App\Http\Controllers;

use App\Maestro;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Hash;

class MaestrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maestros = Maestro::all();

        return view('dashboard.maestros.index')->with('maestros', $maestros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.maestros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $maestro = new Maestro();
        $maestro->nombre =  $request->input('nombre');
        $maestro->apellidos =  $request->input('apellidos');
        $maestro->direccion =  $request->input('direccion');
        $maestro->genero =  $request->input('genero');
        $maestro->fecha_nacimiento =  $request->input('fecha_nacimiento');
        $maestro->telefono =  $request->input('telefono');

        $maestro->save();

        $credentials = $request->only('email', 'password');
        $credentials['name'] = $maestro->nombre;
        $credentials['password'] = Hash::make($credentials['password']);

        $user = User::create($credentials);

        $maestro->user()->save($user);

        return redirect('maestros');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maestro = Maestro::find($id);

        return view('dashboard.maestros.show')->with('maestro', $maestro);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maestro = Maestro::find($id);

        return view('dashboard.maestros.edit')->with('maestro', $maestro);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $maestro = Maestro::find($id);
        $maestro->nombre =  $request->input('nombre');
        $maestro->apellidos =  $request->input('apellidos');
        $maestro->direccion =  $request->input('direccion');
        $maestro->genero =  $request->input('genero');
        $maestro->fecha_nacimiento =  $request->input('fecha_nacimiento');
        $maestro->telefono =  $request->input('telefono');

        $maestro->save();

        return redirect('maestros');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $maestro = Maestro::find($id);
        $maestro->delete();

        // redirect
        //Session::flash('message', 'Successfully deleted the nerd!');
        return redirect('maestros');
    }
}
