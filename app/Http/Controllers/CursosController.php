<?php

namespace App\Http\Controllers;

use App\Grupo;
use Illuminate\Http\Request;

use App\Curso;
use App\Maestro;
use App\Materia;
use App\Http\Requests;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::all();

        return view('dashboard.cursos.index')->with('cursos', $cursos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materias = Materia::pluck('nombre', 'id');
        $maestros = Maestro::pluck('nombre', 'id');
        $data = array('materias' => $materias,
            'maestros' => $maestros);

        return view('dashboard.cursos.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $curso = new Curso();
        $curso->nombre          = $request->input('nombre');
        $curso->fecha_inicio    = $request->input('fecha_inicio');
        $curso->fecha_fin       = $request->input('fecha_fin');
        $curso->descripcion     = $request->input('descripcion');
        $curso->materia_id      = $request->input('materia_id');
        $curso->maestro_id      = $request->input('maestro_id');
        $curso->save();

        return redirect('cursos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curso = Curso::find($id);

        return view('dashboard.cursos.show')->with('curso', $curso);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = Curso::find($id);
        $materias = Materia::pluck('nombre', 'id');
        $maestros = Maestro::pluck('nombre', 'id');
        $data = array(
            'materias' => $materias,
            'maestros' => $maestros,
            'curso' => $curso
        );

        return view('dashboard.cursos.edit')->with($data);
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
        $curso = Curso::find($id);
        $curso->nombre          = $request->input('nombre');
        $curso->fecha_inicio    = $request->input('fecha_inicio');
        $curso->fecha_fin       = $request->input('fecha_fin');
        $curso->descripcion     = $request->input('descripcion');
        $curso->materia_id      = $request->input('materia_id');
        $curso->maestro_id      = $request->input('maestro_id');
        $curso->save();

        return redirect('cursos');
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
        $curso = Curso::find($id);
        $curso->delete();

        // redirect
        return redirect('cursos');
    }

    /**
     * Pantalla de asignasion de grupos
     *
     * @return \Illuminate\Http\Response
     */
    public function asignar($id)
    {
        $curso = Curso::find($id);

        $grupos = Grupo::pluck('nombre', 'id');

        return view('dashboard.cursos.asignar', compact('curso', 'grupos'));
    }

    /**
     * Asignasion de alumnos manual
     *
     * @return \Illuminate\Http\Response
     */
    public function manual(Request $request, $id)
    {
        $curso = Curso::find($id);


        $grupos = $request->input('grupos');

        if ($grupos) {
            foreach ($grupos as $grupo) {
                $curso->grupos()->attach($grupo);
            }
        }

        return redirect('cursos');
    }
}
