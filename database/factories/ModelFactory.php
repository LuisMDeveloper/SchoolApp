<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Alumno::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->firstName,
        'apellidos' => $faker->lastName,
        'direccion' => $faker->address,
        'genero' => $faker->randomElement(['Masculino','Femenino']),
        'fecha_nacimiento' => $faker->date('Y-m-d','2010-01-01'),
        'telefono' => $faker->phoneNumber,
        'como_nos_conociste' => $faker->paragraph,
        'nombre_del_tutor' => $faker->name,
        'num_emergencia' => $faker->phoneNumber,
        'facebook' => $faker->firstName,
    ];
});

$factory->define(App\Maestro::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->firstName,
        'apellidos' => $faker->lastName,
        'direccion' => $faker->address,
        'genero' => $faker->randomElement(['Masculino','Femenino']),
        'fecha_nacimiento' => $faker->date('Y-m-d','2010-01-01'),
        'telefono' => $faker->phoneNumber,
    ];
});

$factory->define(App\Curso::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->colorName,
        'fecha_inicio' => $faker->date('Y-m-d','2010-01-01'),
        'fecha_fin' => $faker->date('Y-m-d','2010-01-01'),
        'descripcion' => $faker->paragraph,
        'maestro_id' => $faker->randomElement(array('1','2','3','4','5')),
        'materia_id' => $faker->randomElement(array('1','2')),
    ];
});

$factory->define(App\Grade::class, function (Faker\Generator $faker) {
    return [
        'competency_id' => App\Competency::all()->random()->id,
        'alumno_id' => App\Alumno::all()->random()->id,
        'grade' => $faker->numberBetween(40, 100)
    ];
});