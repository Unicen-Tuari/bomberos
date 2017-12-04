<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Bombero;

class FirefighterTest extends TestCase
{

    public function testListBombero()
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

    public function testCreateBomberoAsAdmin()
    {
      $user = factory(User::class)->create(['admin'=>true]);

      $response = $this->actingAs($user)
                       ->get('/bombero/create');

      $response->assertStatus(200)
               ->assertSee('Registrar');
    }

    public function testCreateBombero()
    {
      $user = factory(User::class)->create();

      $response = $this->actingAs($user)
                       ->get('/bombero/create');

      $response->assertStatus(200)
               ->assertSee('No tienes permisos');
    }

    public function testEditBomberoAsAdmin()
    {
      $user = factory(User::class)->create(['admin'=>true]);
      $firefigher = factory(Bombero::class)->create();

      $response = $this->actingAs($user)
                       ->get("/bombero/$firefigher->id/edit");

      $response->assertStatus(200)
               ->assertSee($firefigher->apellido)
               ->assertSee('Editar');
    }

    public function testEditBombero()
    {
      $user = factory(User::class)->create();
      $firefigher = factory(Bombero::class)->create();

      $response = $this->actingAs($user)
                       ->get("/bombero/$firefigher->id/edit");

      $response->assertStatus(200)
               ->assertSee('No tienes permisos');
    }

    public function testDeleteBomberoAsAdmin()
    {
      $user = factory(User::class)->create(['admin'=>true]);
      $firefigher = factory(Bombero::class)->create();

      $response = $this->actingAs($user)
                       ->delete("/bombero/$firefigher->id");

      $response->assertRedirect("/bombero");
    }

    public function testoDeleteBombero()
    {
      $user = factory(User::class)->create();
      $firefigher = factory(Bombero::class)->create();

      $response = $this->actingAs($user)
                       ->delete("/bombero/$firefigher->id");

      $response->assertStatus(200)
               ->assertSee('No tienes permisos');
    }

    public function testStoreBombero()
    {
      $user = factory(User::class)->create(['admin'=>true]);
      $firefigher = factory(Bombero::class)->make();
      $data =[
        "nombre" => $firefigher->nombre,
        "apellido" => $firefigher->apellido,
        "nro_legajo" => $firefigher->nro_legajo,
        "jerarquia" => $firefigher->jerarquia,
        "direccion" => $firefigher->direccion,
        "telefono" => $firefigher->telefono,
        "fecha_nacimiento" => '12/12/2002',
      ];

      $response = $this->actingAs($user)
                       ->post("/bombero",$data);

      $response->assertRedirect("/bombero");
    }

    public function testUpdateBombero()
    {
      $user = factory(User::class)->create(['admin'=>true]);
      $firefigher = factory(Bombero::class)->create();
      $new_firefigher = factory(Bombero::class)->make();
      $data =[
        "nombre" => $new_firefigher->nombre,
        "apellido" => $new_firefigher->apellido,
        "nro_legajo" => $new_firefigher->nro_legajo,
        "jerarquia" => $new_firefigher->jerarquia,
        "direccion" => $new_firefigher->direccion,
        "telefono" => $new_firefigher->telefono,
        "fecha_nacimiento" => '12/12/2002',
      ];

      $response = $this->actingAs($user)
                       ->put("/bombero/$firefigher->id",$data);

      $response->assertRedirect("/bombero");
    }
}
