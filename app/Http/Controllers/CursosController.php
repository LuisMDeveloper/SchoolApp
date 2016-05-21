<?php

namespace App\Http\Controllers;

use App\Grupo;
use Illuminate\Http\Request;

use App\Curso;
use App\Maestro;
use App\Materia;
use App\Http\Requests;

use Carbon\Carbon;

use JavaScript;

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
        //return dd($request->all());
        $curso = new Curso();
        $curso->nombre          = $request->input('nombre');
        $curso->fecha_inicio    = $request->input('fecha_inicio');
        $curso->fecha_fin       = $request->input('fecha_fin');
        $curso->descripcion     = $request->input('descripcion');
        $curso->materia_id      = $request->input('materia_id');
        $curso->maestro_id      = $request->input('maestro_id');
        if ($request->input('lunes_time_yes')) {
            //$carbon = new Carbon($request->input('lunes_time_yes'), 'America/Vancouver');
            //dd($request->input('lunes_time'));
            $lunes_time_de = Carbon::createFromFormat('H:i', $request->input('lunes_time_de'))->toTimeString();
            $lunes_time_a = Carbon::createFromFormat('H:i', $request->input('lunes_time_a'))->toTimeString();
            $curso->lunes_de    = $lunes_time_de;
            $curso->lunes_a     = $lunes_time_a;
        }
        if ($request->input('martes_time_yes')) {
            $martes_time_de = Carbon::createFromFormat('H:i', $request->input('martes_time_de'))->toTimeString();
            $martes_time_a = Carbon::createFromFormat('H:i', $request->input('martes_time_a'))->toTimeString();
            $curso->martes_de    = $martes_time_de;
            $curso->martes_a     = $martes_time_a;

        }
        if ($request->input('miercoles_time_yes')) {
            $miercoles_time_de = Carbon::createFromFormat('H:i', $request->input('miercoles_time_de'))->toTimeString();
            $miercoles_time_a = Carbon::createFromFormat('H:i', $request->input('miercoles_time_a'))->toTimeString();
            $curso->miercoles_de    = $miercoles_time_de;
            $curso->miercoles_a     = $miercoles_time_a;
        }
        if ($request->input('jueves_time_yes')) {
            $jueves_time_de = Carbon::createFromFormat('H:i', $request->input('jueves_time_de'))->toTimeString();
            $jueves_time_a = Carbon::createFromFormat('H:i', $request->input('jueves_time_a'))->toTimeString();
            $curso->jueves_de    = $jueves_time_de;
            $curso->jueves_a     = $jueves_time_a;
        }
        if ($request->input('viernes_time_yes')) {
            $viernes_time_de = Carbon::createFromFormat('H:i', $request->input('viernes_time_de'))->toTimeString();
            $viernes_time_a = Carbon::createFromFormat('H:i', $request->input('viernes_time_a'))->toTimeString();
            $curso->viernes_de    = $viernes_time_de;
            $curso->viernes_a     = $viernes_time_a;
        }
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


        JavaScript::put([
            'lunes_de' => $curso->lunes_de,
            'lunes_a' => $curso->lunes_a,

            'martes_de' => $curso->martes_de,
            'martes_a' => $curso->martes_a,
            'miercoles_de' => $curso->miercoles_de,
            'miercoles_a' => $curso->miercoles_a,
            'jueves_de' => $curso->jueves_de,
            'jueves_a' => $curso->jueves_a,
            'viernes_de' => $curso->viernes_de,
            'viernes_a' => $curso->viernes_a,
            'foo' => 'bar',
            'age' => 29
        ]);



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
