<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Bombero;
use App\Ingreso;
use App\Material;

class MaterialTest extends TestCase
{

    public function testListMaterial()
    {
      $user = factory(User::class)->create();
      $newMaterial = factory(Material::class)->create();

      $response = $this->actingAs($user)
                       ->get('/material');

      $response->assertStatus(200)
               ->assertSee('Lista de materiales');
    }
    public function testListButtomsMaterialAdmin()
    {
      $user = factory(User::class)->create(['admin'=>true]);
      $newMaterial = factory(Material::class)->create();

      $response = $this->actingAs($user)
                       ->get('/material');

      $response->assertStatus(200)
               ->assertSee('glyphicon-trash')
               ->assertSee('glyphicon-edit');
              
    }
    public function testCreateMaterialAsAdmin()
    {
      $user = factory(User::class)->create(['admin'=>true]);
      $newMaterial=factory(Material::class)->create();
      $response = $this->actingAs($user)
                       ->get('/material/create');

      $response->assertStatus(200)
               ->assertSee('Alta de material');
    }

    public function testCreateMaterial()
    {
      $user = factory(User::class)->create();

      $response = $this->actingAs($user)
                       ->get('/material/create');

      $response->assertStatus(200)
               ->assertSee('No tienes permisos');
    }

    public function testEditMaterialAsAdmin()
    {
      $user = factory(User::class)->create(['admin'=>true]);
      $newMaterial = factory(Material::class)->create();

      $response = $this->actingAs($user)
                       ->get("/material/$newMaterial->id/edit");

      $response->assertStatus(200)
               ->assertSee('Editar material');
    }

    public function testEditMaterial()
    {
      $user = factory(User::class)->create();
      $newMaterial = factory(Material::class)->create();

      $response = $this->actingAs($user)
                       ->get("/material/$newMaterial->id/edit");

      $response->assertStatus(200)
               ->assertSee('No tienes permisos');
    }

    public function testDeleteMaterialAsAdmin()
    {
      $user = factory(User::class)->create(['admin'=>true]);
      $newMaterial = factory(Material::class)->create();
      $response = $this->actingAs($user)
                       ->delete("/material/$newMaterial->id");

      $response->assertStatus(302);
    }

    public function testDeleteMaterial()
    {
      $user = factory(User::class)->create();
      $newMaterial = factory(Material::class)->create();

      $response = $this->actingAs($user)
                       ->delete("/material/$newMaterial->id");

      $response->assertStatus(200)
               ->assertSee('No tienes permisos');
    }

}
