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
    public function testListButtomsMaterial()
    {
      $user = factory(User::class)->create();
      $newMaterial = factory(Material::class)->create();

      $response = $this->actingAs($user)
                       ->get('/material');

      $response->assertStatus(200)
               ->assertSee('glyphicon glyphicon-trash');
    }
    public function testCreateMaterialAsAdmin()
    {
      $user = factory(User::class)->create(['admin'=>true]);

      $response = $this->actingAs($user)
                       ->get('/Material/create');

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
               ->assertSee($newMaterial->id)
               ->assertSee('Editar Material');
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

      $response->assertRedirect("/material")
               ->assertSee('Lista de materiales');

    }

    public function testoDeleteMaterial()
    {
      $user = factory(User::class)->create();
      $newMaterial = factory(Material::class)->create();

      $response = $this->actingAs($user)
                       ->delete("/material/$newMaterial->id");

      $response->assertStatus(200)
               ->assertSee('No tienes permisos');
    }

    public function testStoreBomberoAsAdmin()
    {
      $user = factory(User::class)->create(['admin'=>true]);
      $firefigher = factory(Bombero::class)->make();
      $data =[
        "nombre" => $firefigher->nombre,
        "apellido" => $firefigher->apellido,
        "cuartel" => $firefigher->cuartel,
        "legajo" => $firefigher->legajo,
        "jerarquia" => $firefigher->jerarquia,
        "direccion" => $firefigher->direccion,
        "telefono" => $firefigher->telefono,
        "fecha_nacimiento" => '12/12/2002',
      ];

      $response = $this->actingAs($user)
                       ->post("/bombero",$data);

      $response->assertRedirect("/bombero");
    }

    public function testStoreBombero()
    {
      $user = factory(User::class)->create();
      $firefigher = factory(Bombero::class)->make();
      $data =[
        "nombre" => $firefigher->nombre,
        "apellido" => $firefigher->apellido,
        "cuartel" => $firefigher->cuartel,
        "legajo" => $firefigher->legajo,
        "jerarquia" => $firefigher->jerarquia,
        "direccion" => $firefigher->direccion,
        "telefono" => $firefigher->telefono,
        "fecha_nacimiento" => '12/12/2002',
      ];

      $response = $this->actingAs($user)
                       ->post("/bombero",$data);

     $response->assertStatus(200)
              ->assertSee('No tienes permisos');
    }


    public function testUpdateBomberoAsAdmin()
    {
      $user = factory(User::class)->create(['admin'=>true]);
      $firefigher = factory(Bombero::class)->create();
      $new_firefigher = factory(Bombero::class)->make();
      $data =[
        "nombre" => $new_firefigher->nombre,
        "apellido" => $new_firefigher->apellido,
        "cuartel" => $new_firefigher->cuartel,
        "legajo" => $new_firefigher->legajo,
        "jerarquia" => $new_firefigher->jerarquia,
        "direccion" => $new_firefigher->direccion,
        "telefono" => $new_firefigher->telefono,
        "fecha_nacimiento" => '12/12/2002',
      ];

      $response = $this->actingAs($user)
                       ->put("/bombero/$firefigher->id",$data);

      $response->assertRedirect("/bombero");
    }

    public function testUpdateBombero()
    {
      $user = factory(User::class)->create();
      $firefigher = factory(Bombero::class)->create();
      $new_firefigher = factory(Bombero::class)->make();
      $data =[
        "nombre" => $new_firefigher->nombre,
        "apellido" => $new_firefigher->apellido,
        "cuartel" => $new_firefigher->cuartel,
        "legajo" => $new_firefigher->legajo,
        "jerarquia" => $new_firefigher->jerarquia,
        "direccion" => $new_firefigher->direccion,
        "telefono" => $new_firefigher->telefono,
        "fecha_nacimiento" => '12/12/2002',
      ];

      $response = $this->actingAs($user)
                       ->put("/bombero/$firefigher->id",$data);

      $response->assertStatus(200)
               ->assertSee('No tienes permisos');
    }
}
