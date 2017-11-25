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

$factory->define(App\Bombero::class, function (Faker\Generator $faker) {

  return [
    'nombre' => $faker->firstName,
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
    'vehiculo_id' => factory(App\Vehiculo::class)->create()->id
  ];

});

$factory->define(App\Servicio::class, function (Faker\Generator $faker) {
  $tipo=$faker->numberBetween($min = 1, $max = 11);
  $num_servicio=$faker->numberBetween($min = 1, $max = 111111);
  $tipo_alarma=$faker->numberBetween($min = 1, $max = 11);
  $alarma = \Carbon\Carbon::now(new DateTimeZone('America/Argentina/Buenos_Aires'))->addMonth(-rand(1,10))->toDateTimeString();
  $salida =\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$alarma)->addMinutes(rand(1,10))->toDateTimeString();
  $regreso=\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$alarma)->addMinutes(rand(30,480))->toDateTimeString();

  return [
    'tipo_servicio_id' => $tipo,
    'num_servicio' => $num_servicio,
    'tipo_alarma' => $tipo_alarma,
    'direccion' => $faker->address,
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

$factory->define(App\Vehiculo::class, function (Faker\Generator $faker){
  return[
    'patente' => $faker->lexify('???') . ' ' . $faker->numerify('###'),
    'num_movil' => $faker->numberBetween($min = 100, $max = 200),
    'estado' => 1,
    'detalle' => 'autobomba',
  ];
});

$factory->define(App\Puntuacion::class, function (Faker\Generator $faker){
  return[
    'id_bombero' => factory(App\Bombero::class)->create()->id,
    'ao_cant' => $faker->randomNumber($nbDigits = 1),
    'ao_punt' => $faker->randomNumber($nbDigits = 1),
    'ao_acad' => $faker->randomNumber($nbDigits = 1),
    'accid_cant' => $faker->randomNumber($nbDigits = 1),
    'accid_punt' => $faker->randomNumber($nbDigits = 1),
    'dedicacion' => $faker->randomNumber($nbDigits = 1),
    'guar_cant' => $faker->randomNumber($nbDigits = 1),
    'guar_punt' => $faker->randomNumber($nbDigits = 1),
    'especiales' => $faker->randomNumber($nbDigits = 1),
    'licencia' => $faker->randomNumber($nbDigits = 1),
    'castigo' => $faker->randomNumber($nbDigits = 1),
    'total' => $faker->randomNumber($nbDigits = 1),
    'detalle' => $faker->realText($maxNbChars = 50, $indexSize = 2),
    'fecha' => $faker->date($format = 'Y-m-d'),
  ];
});
