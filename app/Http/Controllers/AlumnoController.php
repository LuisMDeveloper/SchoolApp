<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AlumnoController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::all();

        return view('dashboard.alumnos.index', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alumno = new Alumno();
        $alumno->nombre =  $request->input('nombre');
        $alumno->apellidos =  $request->input('apellidos');
        $alumno->direccion =  $request->input('direccion');
        $alumno->genero =  $request->input('genero');
        $alumno->fecha_nacimiento =  $request->input('fecha_nacimiento');
        $alumno->telefono =  $request->input('telefono');
        $alumno->como_nos_conociste =  $request->input('como_nos_conociste');
        $alumno->nombre_del_tutor =  $request->input('nombre_del_tutor');
        $alumno->num_emergencia =  $request->input('num_emergencia');
        $alumno->facebook =  $request->input('facebook');

        $alumno->certificado_secundaria = $this->uploadFileForAlumno($request, 'certificado_secundaria', $alumno);
        $alumno->acta_de_nacimiento_path = $this->uploadFileForAlumno($request, 'acta_de_nacimiento_path', $alumno);
        $alumno->curp = $this->uploadFileForAlumno($request, 'curp', $alumno);
        $alumno->comprobande_de_domicilio = $this->uploadFileForAlumno($request, 'comprobande_de_domicilio', $alumno);
        $alumno->certificado_parcial = $this->uploadFileForAlumno($request, 'certificado_parcial', $alumno);

        $alumno->save();

        return redirect('alumnos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumno = Alumno::find($id);

        return view('dashboard.alumnos.show')->with('alumno', $alumno);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumno = Alumno::find($id);

        return view('dashboard.alumnos.edit')->with('alumno', $alumno);
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
        $alumno = Alumno::find($id);
        $alumno->nombre =  $request->input('nombre');
        $alumno->apellidos =  $request->input('apellidos');
        $alumno->direccion =  $request->input('direccion');
        $alumno->genero =  $request->input('genero');
        $alumno->fecha_nacimiento =  $request->input('fecha_nacimiento');
        $alumno->telefono =  $request->input('telefono');
        $alumno->como_nos_conociste =  $request->input('como_nos_conociste');
        $alumno->nombre_del_tutor =  $request->input('nombre_del_tutor');
        $alumno->num_emergencia =  $request->input('num_emergencia');
        $alumno->facebook =  $request->input('facebook');
        $alumno->estado =  $request->input('estado');

        $certificado_secundaria = $this->uploadFileForAlumno($request, 'certificado_secundaria', $alumno);
        $acta_de_nacimiento_path = $this->uploadFileForAlumno($request, 'acta_de_nacimiento_path', $alumno);
        $curp = $this->uploadFileForAlumno($request, 'curp', $alumno);
        $comprobande_de_domicilio = $this->uploadFileForAlumno($request, 'comprobande_de_domicilio', $alumno);
        $certificado_parcial = $this->uploadFileForAlumno($request, 'certificado_parcial', $alumno);

        $alumno->certificado_secundaria = $certificado_secundaria == '' ?  $alumno->certificado_secundaria : $certificado_secundaria;
        $alumno->acta_de_nacimiento_path = $acta_de_nacimiento_path == '' ?  $alumno->acta_de_nacimiento_path : $acta_de_nacimiento_path;
        $alumno->curp = $curp == '' ?  $alumno->curp : $curp;
        $alumno->comprobande_de_domicilio = $comprobande_de_domicilio  == '' ?  $alumno->comprobande_de_domicilio : $comprobande_de_domicilio;
        $alumno->certificado_parcial = $certificado_parcial  == '' ?  $alumno->certificado_parcial : $certificado_parcial;

        $alumno->save();

        return redirect('alumnos');
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

    /**
     * NOTE: Not work with png
     * @param Requests\CreateAlumno $request
     * @param $fileInput
     * @param $person
     * @param $alumno
     */
    public function uploadFileForAlumno(Request $request, $fileInput, $alumno)
    {
        if ($request->hasFile($fileInput)) {
            $file = $request->file($fileInput);
            $extension = $file->getClientOriginalExtension();
            $filename = snake_case($alumno->apellidos) . '_' . snake_case($alumno->nombre) . '_' . $fileInput;
            Storage::disk('public')->put($filename . '.' . $extension, File::get($file));
            return $filename . '.' . $extension;
        } else {
            return '';
        }
    }
}
