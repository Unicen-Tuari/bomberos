<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Bombero;

class FirefighterTest extends TestCase
{

    public function testRouteToBombero()
    {
      $user = factory(User::class)->create();
      $firefigher = factory(Bombero::class)->create();

      $response = $this->actingAs($user)
                       ->get('/bombero');

      $response->assertStatus(200)
               ->assertSee($firefigher->nombre)
               ->assertSee('Bomberos')
               ->assertSee('Buscar');
    }

    public function testRouteToCreateBomberoAsAdmin()
    {
      $user = factory(User::class)->create(['admin'=>true]);

      $response = $this->actingAs($user)
                       ->get('/bombero/create');

      $response->assertStatus(200)
               ->assertSee('Registrar');
    }

    public function testRouteToCreateBombero()
    {
      $user = factory(User::class)->create();

      $response = $this->actingAs($user)
                       ->get('/bombero/create');

      $response->assertStatus(200)
               ->assertSee('No tienes permisos');
    }

    public function testRouteToEditBomberoAsAdmin()
    {
      $user = factory(User::class)->create(['admin'=>true]);
      $firefigher = factory(Bombero::class)->create();

      $response = $this->actingAs($user)
                       ->get("/bombero/$firefigher->id/edit");

      $response->assertStatus(200)
               ->assertSee($firefigher->apellido)
               ->assertSee('Editar');
    }

    public function testRouteToEditBombero()
    {
      $user = factory(User::class)->create();
      $firefigher = factory(Bombero::class)->create();

      $response = $this->actingAs($user)
                       ->get("/bombero/$firefigher->id/edit");

      $response->assertStatus(200)
               ->assertSee('No tienes permisos');
    }

    public function testRouteToDeleteBomberoAsAdmin()
    {
      $user = factory(User::class)->create(['admin'=>true]);
      $firefigher = factory(Bombero::class)->create();

      $response = $this->actingAs($user)
                       ->delete("/bombero/$firefigher->id");

      $response->assertRedirect("/bombero");
    }

    public function testRouteToDeleteBombero()
    {
      $user = factory(User::class)->create();
      $firefigher = factory(Bombero::class)->create();

      $response = $this->actingAs($user)
                       ->delete("/bombero/$firefigher->id");

      $response->assertStatus(200)
               ->assertSee('No tienes permisos');
    }
}
