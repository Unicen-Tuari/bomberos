<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Vehiculo;

class VehicleTest extends TestCase
{

    public function testListVehiculo()
    {
      $user = factory(User::class)->create();
      $vehicle = factory(Vehiculo::class)->create();

      $response = $this->actingAs($user)
                       ->get('/vehiculo');

      $response->assertStatus(200)
               ->assertSee($vehicle->patente)
               ->assertSee('Vehiculos')
               ->assertSee('Buscar');
    }

    public function testCreateVehiculoAsAdmin()
    {
      $user = factory(User::class)->create(['admin'=>true]);

      $response = $this->actingAs($user)
                       ->get('/vehiculo/create');

      $response->assertStatus(200)
               ->assertSee('Registrar');
    }

    public function testCreateVehiculo()
    {
      $user = factory(User::class)->create();

      $response = $this->actingAs($user)
                       ->get('/vehiculo/create');

      $response->assertStatus(200)
               ->assertSee('No tienes permisos');
    }

    public function testEditVehiculoAsAdmin()
    {
      $user = factory(User::class)->create(['admin'=>true]);
      $vehicle = factory(Vehiculo::class)->create();

      $response = $this->actingAs($user)
                       ->get("/vehiculo/$vehicle->id/edit");

      $response->assertStatus(200)
               ->assertSee($vehicle->patente)
               ->assertSee('Editar');
    }

    public function testEditVehiculo()
    {
      $user = factory(User::class)->create();
      $vehicle = factory(Vehiculo::class)->create();

      $response = $this->actingAs($user)
                       ->get("/vehiculo/$vehicle->id/edit");

      $response->assertStatus(200)
               ->assertSee('No tienes permisos');
    }

    public function testDeleteVehiculoAsAdmin()
    {
      $user = factory(User::class)->create(['admin'=>true]);
      $vehicle = factory(Vehiculo::class)->create();

      $response = $this->actingAs($user)
                       ->delete("/vehiculo/$vehicle->id");

      $response->assertRedirect("/vehiculo");
    }

    public function testoDeleteVehiculo()
    {
      $user = factory(User::class)->create();
      $vehicle = factory(Vehiculo::class)->create();

      $response = $this->actingAs($user)
                       ->delete("/vehiculo/$vehicle->id");

      $response->assertStatus(200)
               ->assertSee('No tienes permisos');
    }

    public function testStoreVehiculoAsAdmin()
    {
      $user = factory(User::class)->create(['admin'=>true]);

      $data =[
        "patente" => 'ABC 123',
        "num_movil" => '1',
        "estado" => '1',
        "detalle" => null,
      ];

      $response = $this->actingAs($user)
                       ->post("/vehiculo",$data);

      $response->assertRedirect("/vehiculo");
    }

    public function testStoreVehiculo()
    {
      $user = factory(User::class)->create();

      $data =[
        "patente" => 'ABC 123',
        "num_movil" => '1',
        "estado" => '1',
        "detalle" => null,
      ];

      $response = $this->actingAs($user)
                       ->post("/vehiculo",$data);

     $response->assertStatus(200)
              ->assertSee('No tienes permisos');
    }


    public function testUpdateVehiculoAsAdmin()
    {
      $user = factory(User::class)->create(['admin'=>true]);
      $vehicle = factory(Vehiculo::class)->create();
      $new_vehicle = factory(Vehiculo::class)->make();
      $data =[
        "patente" => $new_vehicle->patente,
        "num_movil" => $new_vehicle->num_movil,
        "estado" => $new_vehicle->estado,
        "detalle" => $new_vehicle->detalle,
      ];

      $response = $this->actingAs($user)
                       ->put("/vehiculo/$vehicle->id",$data);

      $response->assertRedirect("/vehiculo");
    }

    public function testUpdateVehiculo()
    {
      $user = factory(User::class)->create();
      $vehicle = factory(Vehiculo::class)->create();
      $new_vehicle = factory(Vehiculo::class)->make();
      $data =[
        "patente" => $new_vehicle->patente,
        "num_movil" => $new_vehicle->num_movil,
        "estado" => $new_vehicle->estado,
        "detalle" => $new_vehicle->detalle,
      ];

      $response = $this->actingAs($user)
                       ->put("/vehiculo/$vehicle->id",$data);

      $response->assertStatus(200)
               ->assertSee('No tienes permisos');
    }

    public function testShowVehiculo()
    {
      $user = factory(User::class)->create();
      $vehicle = factory(Vehiculo::class)->create();

      $response = $this->actingAs($user)
                       ->get("/vehiculo/$vehicle->id");

      $response->assertStatus(200)
               ->assertSee($vehicle->patente);
    }
}
