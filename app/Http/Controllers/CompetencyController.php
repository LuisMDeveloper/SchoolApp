<?php

namespace App\Http\Controllers;

use App\Competency;
use App\Curso;
use Illuminate\Http\Request;

use App\Http\Requests;

class CompetencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cursoId)
    {
        $curso = Curso::find($cursoId);
        $competencies = $curso->competencies;

        //dd($curso);

        return view('dashboard.competencies.index')->with('competencies', $competencies)->with('curso', $curso);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cursoId)
    {
        $curso = Curso::find($cursoId);

        return view('dashboard.competencies.create')->with('curso', $curso);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $cursoId)
    {
        $curso = Curso::find($cursoId);
        $competency = new Competency();
        $competency->name          = $request->input('nombre');
        $competency->description     = $request->input('descripcion');
        $competency->curso_id = $curso->id;

        $competency->save();

        return redirect('cursos/'.$curso->id.'/competencies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cursoId, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($cursoId, $id)
    {
        $curso = Curso::find($cursoId);
        $competency = Competency::find($id);

        return view('dashboard.competencies.edit')->with('competency', $competency)->with('curso', $curso);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cursoId, $id)
    {
        $competency                 = Competency::find($id);
        $competency->name           = $request->input('name');
        $competency->description    = $request->input('description');
        $competency->curso_id       = $cursoId;

        $competency->save();

        return redirect('cursos/'.$cursoId.'/competencies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cursoId, $id)
    {
        // delete
        $competency = Competency::find($id);
        $competency->delete();

        // redirect
        return redirect('cursos/'.$cursoId.'/competencies');
    }
}
