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

$factory->define(App\Bombero::class, function (Faker\Generator $faker) {

  return [
    'nombre' => $faker->name,
    'apellido' => $faker->lastName,
    'nro_legajo' => $faker->randomNumber($nbDigits = 6),
    'jerarquia' => $faker->jobTitle,
    'direccion' => $faker->address,
    'telefono' => $faker->e164PhoneNumber,
    'fecha_nacimiento' => $faker->date($format = 'Y-m-d', $max = '1990-01-01'),
  ];

});
