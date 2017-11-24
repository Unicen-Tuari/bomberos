<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Vehiculo;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VehicleTest extends TestCase
{
    public function testScopePatente()
    {
       $vehiculo = factory(Vehiculo::class)->create();
       $vehiculo2 = factory(Vehiculo::class)->create();
       $vehiculoModel = Vehiculo::patente($vehiculo->patente);
       $this->assertEquals($vehiculoModel->first()->patente, $vehiculo->patente);
       $this->assertEquals($vehiculoModel->count(),1);
    }

    public function testScopeMovil()
    {
      $vehiculo = factory(Vehiculo::class)->create();
      $vehiculo2 = factory(Vehiculo::class)->create();
      $vehiculoModel = Vehiculo::movil($vehiculo->num_movil);
      $this->assertEquals($vehiculoModel->first()->num_movil, $vehiculo->num_movil);
      $this->assertEquals($vehiculoModel->count(),1);
    }

    public function testScopeEstado()
    {
      $vehiculo = factory(Vehiculo::class)->create(['estado' => 2]);
      $vehiculo2 = factory(Vehiculo::class)->create(['estado' => 1]);
      $vehiculoModel = Vehiculo::estado($vehiculo->estado);
      $this->assertEquals($vehiculoModel->first()->estado, $vehiculo->estado);
      $this->assertEquals($vehiculoModel->count(),1);
    }
}
