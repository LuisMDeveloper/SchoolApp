<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Competency;
use App\Grade;
use Illuminate\Http\Request;
use App\Curso;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::all();

        return view('dashboard.grades.index')->with('cursos', $cursos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deCurso($id)
    {
        $curso = Curso::find($id);
        $competencies = $curso->competencies;
        $grupos = $curso->grupos;

        return view('dashboard.grades.deCurso', compact('curso', 'competencies', 'grupos'));
    }

    public function calificar($alumno_id, $curso_id)
    {
        $alumno = Alumno::find($alumno_id);
        $curso = Curso::find($curso_id);

        $grades = Grade::where('alumno_id', $alumno->id)
            ->whereIn('competency_id', $curso->competencies->lists('id')->toArray())
            ->get();
        //dd($grades);

        return view('dashboard.grades.calificar', compact('curso', 'alumno', 'grades'));
    }

    public function calificarAlumno(Request $request, $alumno_id, $curso_id)
    {
        $alumno = Alumno::find($alumno_id);
        $curso = Curso::find($curso_id);
        $competencies = $curso->competencies;

        foreach($competencies as $competency) {
            //$grade = Grade::firstOrNew(['competency_id' => $competency->id,'alumno_id' => $alumno_id]);
            //dd($grade);
            $update = true;
            $grade = Grade::where('alumno_id', $alumno_id)
                ->where('competency_id', $competency->id)
                ->get()->first();
            //dd($grade);
            if (!$grade) {
                $grade = new Grade();
                $update = false;
            }
            $grade->competency_id = $competency->id;
            $grade->alumno_id = $alumno_id;
            $grade->grade = $request->input(camel_case($competency->name));
            if ($update) {
                DB::table('grades')
                    ->where('alumno_id', $alumno_id)
                    ->where('competency_id', $competency->id)
                    ->update(['grade' => $request->input(camel_case($competency->name))]);
            } else {
                $grade->save();
            }
        }

        return redirect('grades/curso/'.$curso->id);
    }

}
