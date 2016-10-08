<?php

use Illuminate\Database\Seeder;
use App\Material;
use App\Vehiculo;

class MaterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $vehiculos = Vehiculo::all();

      $materiales = factory(Material::class)->times(100)->make();

      foreach ($materiales as $material) {
        $vehiculo = $vehiculos->random();
        $vehiculo->materiales()->save($material);
      }

      factory(Material::class)->times(10)->create();
    }
}
