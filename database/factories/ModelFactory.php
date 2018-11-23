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
    'cuartel' => '033',
    'legajo' => $faker->unique()->randomNumber($nbDigits = 3),
    'jerarquia' => $faker->numberBetween($min = 1, $max = 6),
    'direccion' => $faker->address,
    'telefono' => $faker->e164PhoneNumber,
    'fecha_nacimiento' => $faker->date($format = 'Y-m-d', $max = '1990-01-01'),
  ];
});
$factory->define(App\Material::class, function (Faker\Generator $faker) {
  return [
    'nombre' => str_random(12),
    'vehiculo_id' => factory(App\Vehiculo::class)->create()->id,
    'mantenimiento' => 0,
    'detalle' => $faker->text,
    'reparado' => 0,
    'rubro' => 1,
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
    'num_movil' => $faker->unique()->numberBetween($min = 50, $max = 200),
    'estado' => 1,
    'detalle' => 'autobomba',
  ];
});

$factory->define(App\Asistencia::class, function (Faker\Generator $faker) {
  return [
    'fecha_reunion' => $faker->date($format = 'd/m/Y', $max = '30/10/2017'),
  ];
});

$factory->define(App\Ingreso::class, function (Faker\Generator $faker){
  return[
    'id_bombero' => factory(App\Bombero::class)->create()->id,
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

$factory->define(App\Reemplazo::class, function (Faker\Generator $faker){
  $fecha = date('Y-m-d');
  $fechaFin = strtotime('+2day' , strtotime($fecha));
  $fechaFin = date('Y-m-d' , $fechaFin);
  return[
    'id_bombero' => factory(App\Bombero::class)->create()->id,
    'id_bombero_reemplazo' => factory(App\Bombero::class)->create()->id,
    'fecha_inicio' => $fecha,
    'fecha_fin' => $fechaFin,
    'razon' => $faker->realText($maxNbChars = 50, $indexSize = 2),
  ];
});

  $factory->define(App\Variables::class, function (Faker\Generator $faker) {
    return [
      'asistencia' => $faker->randomNumber($nbDigits = 6),
      'accidentales' => $faker->randomNumber($nbDigits = 6),
      'guardias' => $faker->randomNumber($nbDigits = 6),
      'year' => $faker->numberBetween($min = 1800, $max = 2300),
    ];
  });

  $factory->define(App\TipoAsistencia::class, function (Faker\Generator $faker) {
    return [
      'nombre' => $faker->word,
    ];
  });

  $factory->define(App\BomberoServicio::class, function (Faker\Generator $faker) {
    return [
      'bombero_id' => factory(App\Bombero::class)->create()->id,
      'servicio_id' => factory(App\Servicio::class)->create()->id,
      'tipo_id' => factory(App\TipoAsistencia::class)->create()->id,
    ];
  });

  $factory->define(App\VehiculoServicio::class, function (Faker\Generator $faker) {
    return [
      'vehiculo_id' => factory(App\Vehiculo::class)->create()->id,
      'servicio_id' => factory(App\Servicio::class)->create()->id,
    ];
  });

  $factory->define(App\Planilla::class, function (Faker\Generator $faker){
    $mes= 'Enero';
    return[
      'jefe_guardia' => $faker->name(), 
      'nro_guardia'=> $faker->randomNumber($nbDigits = 3),
      'inicio_semana'=> $faker->numberBetween($min = 1, $max = 31), 
      'fin_semana' => $faker->numberBetween($min = 1, $max = 31),
      'mes' => $mes, 
      'year'=> $faker->numberBetween($min = 1800, $max = 2300),
    ];
  });
  
  $factory->define(App\Renglon::class, function (Faker\Generator $faker) {
    return [
      'planilla_id' => factory(App\Planilla::class)->create()->id,
      'descripcion_responsabilidad' => $faker->realText($maxNbChars = 50, $indexSize = 2),
      'responsable' => $faker->name(),
      'ayudante' => $faker->name(),
    ];
  }); 