<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PlanillaTest extends TestCase
{

    public function testShowPlanillaMenu()
    {
      $user = factory(\App\User::class)->create();
    

      $response = $this->actingAs($user)
                       ->get('/planilla');

      $response->assertStatus(200)
               ->assertDontSee('Cargar')
               ->assertSee('Planilla');
    }

    public function testShowPlanillaMenuAsAdmin()
    {
      $user = factory(\App\User::class)->create(['admin'=>true]);

      $response = $this->actingAs($user)
                       ->get('/planilla');

      $response->assertStatus(200)
               ->assertSee('Cargar');
    }

    public function testShowPlanillaAdd()
    {
      $user = factory(\App\User::class)->create();
    

      $response = $this->actingAs($user)
                       ->get('/planilla/create');

      $response->assertStatus(200)
               ->assertSee('No tienes permisos');
    }

    public function testShowPlanillaAddAsAdmin()
    {
      $user = factory(\App\User::class)->create(['admin'=>true]);

      $response = $this->actingAs($user)
                       ->get('/planilla/create');

      $response->assertStatus(200)
               ->assertSee('Alta planilla');
    }

    public function testEditPlanilla()
    {
      $user = factory(\App\User::class)->create();
      $planilla = factory(\App\Planilla::class)->create();

      $response = $this->actingAs($user)
                       ->get("/planilla/$planilla->id/edit");

      $response->assertStatus(200)
               ->assertSee('No tienes permisos');
    }

    public function testEditPlanillaAsAdmin()
    {
      $user = factory(\App\User::class)->create(['admin'=>true]);
      $planilla = factory(\App\Planilla::class)->create();  

      $response = $this->actingAs($user)
                       ->get("/planilla/$planilla->id/edit");

      $response->assertStatus(200)
               ->assertSee('Editar Planilla');
    }

    public function testDeletePlanilla()
    {
      $user = factory(\App\User::class)->create();
      $planilla = factory(\App\Planilla::class)->create();

      $response = $this->actingAs($user)
                       ->delete("/planilla/$planilla->id");

      $response->assertStatus(200)
               ->assertSee('No tienes permisos');
    }

    public function testDeleteUsuarioAsAdmin()
    {
      $user = factory(\App\User::class)->create(['admin'=>true]);
      $planilla = factory(\App\Planilla::class)->create();

      $response = $this->actingAs($user)
                       ->delete("/planilla/$planilla->id");

      $response->assertRedirect("/planilla");
    }

    
}