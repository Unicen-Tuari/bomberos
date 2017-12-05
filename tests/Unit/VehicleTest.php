<?php

namespace Tests\Unit;
use Tests\TestCase;
use App\Vehiculo;
use App\Servicio;
use App\Material;
use App\VehiculoServicio;
use Illuminate\Foundation\Testing\RefreshDatabase;
class VehicleTest extends TestCase
{
  public function testScopePatente()
  {
    $vehiculo = factory(Vehiculo::class)->create(['patente' => 'PPP 333']);
    $vehiculo2 = factory(Vehiculo::class)->create(['patente' => 'RRR 123']);
    $vehiculoModel = Vehiculo::patente($vehiculo->patente);
    $this->assertEquals($vehiculoModel->first()->patente, $vehiculo->patente);
    $this->assertEquals($vehiculoModel->count(),1);
  }
  public function testScopeMovil()
  {
    $vehiculo = factory(Vehiculo::class)->create(['num_movil' => 2]);
    $vehiculo2 = factory(Vehiculo::class)->create(['num_movil' => 3]);
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
  public function testServicios()
  {
    $service = factory(Servicio::class)->create();
    $vehiculo = factory(Vehiculo::class)->create();
    $vehiculoServicio = factory(VehiculoServicio::class)->create(['vehiculo_id'=>$vehiculo->id]);
    $this->assertEquals($vehiculo->servicios()->first()->vehiculo_id, $vehiculo->id);
    $this->assertEquals($vehiculo->servicios()->count(), 1);
  }
  public function testMateriales()
  {
    $vehiculo = factory(Vehiculo::class)->create();
    $material = factory(Material::class)->create(['vehiculo_id'=>$vehiculo->id]);
    $this->assertEquals($vehiculo->materiales()->first()->material_id, $material->material_id);
    $this->assertEquals($vehiculo->materiales()->count(), 1);
  }
}
