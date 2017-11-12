<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Vehiculo;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VehicleTest extends TestCase
{
    public function testScopePatente()
    {
      //setUp
       $vehiculo = factory(Vehiculo::class)->create();
      //Modelo a probar
       $vehiculoModel = Vehiculo::movil($vehiculo->patente)->first();
      //Assert
       $this->assertEquals($vehiculoModel->patente, $vehiculo->patente);
    }
}
