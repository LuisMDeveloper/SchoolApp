<?php
$excel = App::make('excel');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    //$users = \App\User::where('loggable_type', '=', 'App\Alumno')->get()->contains('id', 2);
    //return dd($users);
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('file/{file}', ['as' => 'document', function ($file) {
    $storagePath  = Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix();
    return response()->download($storagePath.$file);//
}]);

Route::resource('usuarios', 'UserController');
Route::resource('alumnos', 'AlumnoController');

Route::get('grupos/asignar/{id}', 'GrupoController@asignar');
Route::get('grupos/random/{id}', 'GrupoController@random');
Route::get('grupos/alfa/{id}', 'GrupoController@alfa');
Route::get('grupos/ecxel/{id}', 'GrupoController@ecxel');
Route::put('grupos/manual/{id}', 'GrupoController@manual');
Route::get('grupos/quitar/{grupo}/{alumno}', 'GrupoController@quitar');
Route::resource('grupos', 'GrupoController');
Route::resource('cursos.competencies', 'CompetencyController');

Route::resource('materias', 'MateriaController');
Route::resource('maestros', 'MaestrosController');
Route::get('cursos/asignar/{id}', 'CursosController@asignar');
Route::put('cursos/manual/{id}', 'CursosController@manual');
Route::resource('cursos', 'CursosController');
Route::resource('grades', 'GradeController');
Route::get('grades/curso/{id}', 'GradeController@deCurso');
Route::get('grades/alumno/{alumno}/cursos/{cursos}', 'GradeController@calificar');
Route::put('grades/alumno/{alumno}/cursos/{cursos}', 'GradeController@calificarAlumno');
Route::resource('attendance', 'AttendanceController');
Route::get('attendance/curso/{id}', 'AttendanceController@deCurso');
Route::get('attendance/alumno/{alumno}/cursos/{cursos}', 'AttendanceController@asistencia');
Route::put('attendance/alumno/{alumno}/cursos/{cursos}', 'AttendanceController@asistenciaAlumno');
Route::get('attendance/grupo/{grupo}/cursos/{cursos}', 'AttendanceController@asistenciaExcel');