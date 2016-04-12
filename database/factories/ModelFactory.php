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
