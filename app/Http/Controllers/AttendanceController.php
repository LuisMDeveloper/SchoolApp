<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Attendance;
use App\Curso;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::all();

        return view('dashboard.attendance.index', compact('cursos'));
    }

    public function deCurso($id)
    {
        $curso = Curso::find($id);
        $grupos = $curso->grupos;

        //$dates=array();
        $inicio = Carbon::createFromFormat('Y-m-d', $curso->fecha_inicio);
        $fin = Carbon::createFromFormat('Y-m-d', $curso->fecha_fin);

        $attendances = Attendance::where('curso_id', $curso->id)->get();

        $daysOfCurse = 0;

        $dates = array();

        if ($curso->lunes_de != '00:00:00') {
            $daysOfCurse += $inicio->diffInDaysFiltered(function(Carbon $date) use (&$dates) {
                if ($date->isMonday()) {
                    $dates[] = $date;
                    return true;
                } else {
                    return false;
                }
            }, $fin);
        }

        if ($curso->martes_de != '00:00:00') {
            $daysOfCurse += $inicio->diffInDaysFiltered(function(Carbon $date) use (&$dates) {
                if ($date->isTuesday()) {
                    $dates[] = $date;
                    return true;
                } else {
                    return false;
                }
            }, $fin);
        }

        if ($curso->miercoles_de != '00:00:00') {
            $daysOfCurse += $inicio->diffInDaysFiltered(function(Carbon $date) use (&$dates) {
                if ($date->isWednesday()) {
                    $dates[] = $date;
                    return true;
                } else {
                    return false;
                }
            }, $fin);
        }

        if ($curso->jueves_de != '00:00:00') {
            $daysOfCurse += $inicio->diffInDaysFiltered(function(Carbon $date) use (&$dates) {
                if ($date->isThursday()) {
                    $dates[] = $date;
                    return true;
                } else {
                    return false;
                }
            }, $fin);
        }

        if ($curso->viernes_de != '00:00:00') {
            $daysOfCurse += $inicio->diffInDaysFiltered(function(Carbon $date) use (&$dates) {
                if ($date->isFriday()) {
                    $dates[] = $date;
                    return true;
                } else {
                    return false;
                }
            }, $fin);
        }


        //fechas
        //$daysOfCurse = $inicio->diffInDaysFiltered(function(Carbon $date) {
        //    return $date->isMonday() || $date->isTuesday();
        //}, $fin);

        //dd($daysOfCurse);
        //dd($dates);

        $days = range(1,$daysOfCurse);

        return view('dashboard.attendance.deCurso', compact('curso', 'grupos', 'days', 'dates', 'attendances'));
    }

    public function asistencia($alumno_id, $curso_id)
    {
        $alumno = Alumno::find($alumno_id);
        $curso = Curso::find($curso_id);

        $inicio = Carbon::createFromFormat('Y-m-d', $curso->fecha_inicio);
        $fin = Carbon::createFromFormat('Y-m-d', $curso->fecha_fin);

        $attendances = Attendance::where('alumno_id', $alumno_id)
            ->where('curso_id', $curso->id)
            ->get();

        $dates = array();
        $daysOfCurse = 0;

        if ($curso->lunes_de != '00:00:00') {
            $daysOfCurse += $inicio->diffInDaysFiltered(function(Carbon $date) use (&$dates) {
                if ($date->isMonday()) {
                    $dates[] = $date;
                    return true;
                } else {
                    return false;
                }
            }, $fin);
        }

        if ($curso->martes_de != '00:00:00') {
            $daysOfCurse += $inicio->diffInDaysFiltered(function(Carbon $date) use (&$dates) {
                if ($date->isTuesday()) {
                    $dates[] = $date;
                    return true;
                } else {
                    return false;
                }
            }, $fin);
        }

        if ($curso->miercoles_de != '00:00:00') {
            $daysOfCurse += $inicio->diffInDaysFiltered(function(Carbon $date) use (&$dates) {
                if ($date->isWednesday()) {
                    $dates[] = $date;
                    return true;
                } else {
                    return false;
                }
            }, $fin);
        }

        if ($curso->jueves_de != '00:00:00') {
            $daysOfCurse += $inicio->diffInDaysFiltered(function(Carbon $date) use (&$dates) {
                if ($date->isThursday()) {
                    $dates[] = $date;
                    return true;
                } else {
                    return false;
                }
            }, $fin);
        }

        if ($curso->viernes_de != '00:00:00') {
            $daysOfCurse += $inicio->diffInDaysFiltered(function(Carbon $date) use (&$dates) {
                if ($date->isFriday()) {
                    $dates[] = $date;
                    return true;
                } else {
                    return false;
                }
            }, $fin);
        }

        return view('dashboard.attendance.asistencia', compact('curso', 'alumno', 'dates', 'attendances'));
    }

    public function asistenciaAlumno(Request $request, $alumno_id, $curso_id)
    {
        //dd($request->all());
        $alumno = Alumno::find($alumno_id);
        $curso = Curso::find($curso_id);

        $dates = array_where($request->all(), function($key, $value)
        {
            return starts_with($key, "date_");
        });

        $hidden = array_where($request->all(), function($key, $value)
        {
            return starts_with($key, "hidden_");
        });

        $hidden_flatten = array_flatten($hidden);
        $dates_flatten = array_flatten($dates);

        //$total_dates = array_except($hidden_flatten, $dates_flatten);
        $total_dates = array();
        //foreach ($hidden_flatten as $data) {

        //}

        $uncheked_dates = array_where($hidden_flatten, function ($key, $value) use (&$dates_flatten) {
            return !in_array($value, $dates_flatten);
        });

        $data = array($hidden_flatten,$dates_flatten,$uncheked_dates);
        //dd($data);
        //dd($dates);

        foreach($dates as $key => $date) {
            $attendance = Attendance::where('alumno_id', $alumno_id)
                ->where('curso_id', $curso->id)
                ->where('fecha', $date)
                ->get()->first();
            if (!$attendance) {
                $attendance = new Attendance();
                $attendance->curso_id = $curso->id;
                $attendance->alumno_id = $alumno_id;
                $attendance->fecha = $date;
                $attendance->save();
            }
        }

        foreach($uncheked_dates as $date) {
            $attendance = Attendance::where('alumno_id', $alumno_id)
                ->where('curso_id', $curso->id)
                ->where('fecha', $date)
                ->get()->first();
            if ($attendance) {
                DB::table('attendances')
                    ->where('alumno_id', $alumno_id)
                    ->where('curso_id', $curso->id)
                    ->where('fecha', $date)
                    ->delete();
                //$attendance->delete();
            }
        }

        return redirect('attendance/curso/'.$curso_id);
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
}
