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
    'activo'=>1,
    'apellido' => $faker->lastName,
    'nro_legajo' => $faker->randomNumber($nbDigits = 6),
    'jerarquia' => $faker->numberBetween($min = 1, $max = 6),
    'direccion' => $faker->address,
    'telefono' => $faker->e164PhoneNumber,
    'fecha_nacimiento' => $faker->date($format = 'Y-m-d', $max = '1990-01-01'),
  ];

});

$factory->define(App\Material::class, function (Faker\Generator $faker) {

  return [
    'nombre' => $faker->word,
  ];

});

$factory->define(App\Servicio::class, function (Faker\Generator $faker) {
  $tipo=$faker->numberBetween($min = 1, $max = 11);
  $alarma = \Carbon\Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires'))->addMonth(-rand(1,10))->toDateTimeString();
  $salida =\Carbon\Carbon::createFromFormat('d/m/Y H:i:s',$alarma)->addMinutes(rand(1,10))->toDateTimeString();
  $regreso=\Carbon\Carbon::createFromFormat('d/m/Y H:i:s',$alarma)->addMinutes(rand(30,480))->toDateTimeString();

  return [
    'tipo_servicio_id' => $tipo,
    'direccion' => $faker->address,
    'descripcion' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    'ilesos' => $faker->randomNumber($nbDigits = 1),
    'lesionados' => $faker->randomNumber($nbDigits = 1),
    'quemados' => $faker->randomNumber($nbDigits = 1),
    'muertos' => $faker->randomNumber($nbDigits = 1),
    'otros' => $faker->randomNumber($nbDigits = 1),
    'combustible' => $faker->randomNumber($nbDigits = 3),
    'reconocimiento' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    'disposiciones' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    'hora_alarma' => $alarma,
    'hora_salida' => $salida,
    'hora_regreso' => $regreso,
  ];

});
