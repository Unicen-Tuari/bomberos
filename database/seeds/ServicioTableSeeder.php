<?php

use Illuminate\Database\Seeder;
use App\Bombero;
use App\Vehiculo;
use App\Servicio;
use App\BomberoServicio;
use App\VehiculoServicio;

class ServicioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $bomberos = Bombero::all();
      $vehiculos = Vehiculo::all();

      $servicios=factory(Servicio::class)->times(50)->create();
      foreach ($servicios as $servicio) {
        $cantidab=rand(1,14);
        $bomberosactivos = $bomberos->random($cantidab);
        if($cantidab!=1){
          foreach ($bomberosactivos as $bombero) {
            BomberoServicio::create(['servicio_id'=>$servicio->id,'bombero_id'=>$bombero->id]);
          };
        }else{
          BomberoServicio::create(['servicio_id'=>$servicio->id,'bombero_id'=>$bomberosactivos->id]);
        }

        $cantidadv=round($cantidab/3);
        if ($cantidadv!=0) {
          $vehiculosactivos = $vehiculos->random($cantidadv);
          if ($cantidadv!=1) {
            foreach ($vehiculosactivos as $vehiculo) {
              VehiculoServicio::create(['servicio_id'=>$servicio->id,'vehiculo_id'=>$vehiculo->id]);
            }
          }else{
            VehiculoServicio::create(['servicio_id'=>$servicio->id,'vehiculo_id'=>$vehiculosactivos->id]);
          }
        }
      }
    }
}
