<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RenglonesTest extends TestCase
{

    public function testShowRenglonLista()
    {
      $user = factory(\App\User::class)->create();
      $planilla = factory(\App\Planilla::class)->create();

      $response = $this->actingAs($user)
                       ->get("/planilla/$planilla->id/renglon");

      $response->assertStatus(200)
   //            ->assertDontSee('Nuevo dato')
               ->assertSee('Datos de la planilla');
    }

    public function testShowRenglonListaAsAdmin()
    {
      $user = factory(\App\User::class)->create();
      $planilla = factory(\App\Planilla::class)->create();

      $response = $this->actingAs($user)
                       ->get("/planilla/$planilla->id/renglon");

      $response->assertStatus(200)
               ->assertSee('Datos de la planilla');
     //          ->assertSee('Nuevo dato');
    }
    public function testShowRenglonAdd()
    {
      $user = factory(\App\User::class)->create();
      $planilla = factory(\App\Planilla::class)->create();

      $response = $this->actingAs($user)
                       ->get("/planilla/$planilla->id/renglon/create");

      $response->assertStatus(200)
               ->assertSee('No tienes permisos');
    }

    public function testShowRenglonAddAsAdmin()
    {
      $user = factory(\App\User::class)->create(['admin'=>true]);
      $planilla = factory(\App\Planilla::class)->create();

      $response = $this->actingAs($user)
                       ->get("/planilla/$planilla->id/renglon/create");

      $response->assertStatus(200)
               ->assertSee('Alta de renglones de la planilla');
    }

    public function testEditRenglon()
    {
      $user = factory(\App\User::class)->create();
      $planilla = factory(\App\Planilla::class)->create();
      $renglon = factory(\App\Renglon::class)->create();

      $response = $this->actingAs($user)
                       ->get("/planilla/$planilla->id/renglon/$renglon->id/edit");

      $response->assertStatus(200)
               ->assertSee('No tienes permisos');
    }

    public function testEditRenglonAsAdmin()
    {
      $user = factory(\App\User::class)->create(['admin'=>true]);
      $planilla = factory(\App\Planilla::class)->create();  
      $renglon = factory(\App\Renglon::class)->create();

      $response = $this->actingAs($user)
                       ->get("/planilla/$planilla->id/renglon/$renglon->id/edit");

      $response->assertStatus(200)
               ->assertSee('Editar datos de la planilla');
    }

    public function testDeleteRenglon()
    {
      $user = factory(\App\User::class)->create();
      $planilla = factory(\App\Planilla::class)->create();
      $renglon = factory(\App\Renglon::class)->create();

      $response = $this->actingAs($user)
                       ->delete("/planilla/$planilla->id/renglon/$renglon->id");

      $response->assertStatus(200)
               ->assertSee('No tienes permisos');
    }

    public function testDeleteRenglonAsAdmin()
    {
      $user = factory(\App\User::class)->create(['admin'=>true]);
      $planilla = factory(\App\Planilla::class)->create();
      $renglon = factory(\App\Renglon::class)->create();

      $response = $this->actingAs($user)
                       ->delete("/planilla/$planilla->id/renglon/$renglon->id");

      $response->assertRedirect("/planilla/$planilla->id/renglon");
    }
}