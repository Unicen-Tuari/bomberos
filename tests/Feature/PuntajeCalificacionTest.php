<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Variables;

class PuntajeCalificacionTest extends TestCase
{

  public function testAcceder()
  {
    //Ver listado de puntajes como usuario -1
    $user = factory(User::class)->create();

    $response = $this->actingAs($user)
                     ->get('/variable');

    $response->assertStatus(200)//or 300
             ->assertSee('Lista de variables');
  }

  public function testAccederAlta()
  {
    //No acceder a la página de alta como usuario -2
    $user = factory(User::class)->create();

    $response = $this->actingAs($user)
                     ->get('/variable/create');

    $response->assertStatus(200)//or 300
             ->assertSee('No tienes permisos');
  }

public function testAccederModif()
  {
    //No acceder a la página de modificación como usuario -3
    $user = factory(User::class)->create();
    $variable = factory(Variables::class)->create();

    $response = $this->actingAs($user)
                     ->get("/variable/$variable->id/edit");

    $response->assertStatus(200)
              ->assertSee('No tienes permisos');
  }

// public function testAccederBorrado()
//   {
//     //No acceder al borrado como usuario -4
//     $user = factory(User::class)->create();
//     $variable = factory(Variables::class)->create();
//
//     $response = $this->actingAs($user)
//                      ->post("/variable/$variable->id/delete");
//
//     $response->assertStatus(200)
//               ->assertSee('No tienes permisos');
//   }

  public function AltaVariableAdmin()
  {
    //Acceder a página de alta como usuario admin -5
    $user = factory(User::class)->create(['admin'=>true]);
    $variable = factory(Variables::class)->create();

    $response = $this->actingAs($user)
                     ->get("/variable/create");
    $response->assertStatus(200)
              ->assertSee('Crear una nueva variable');
  }


public function EditPuntanjeAdmin()
{
  //Acceder a página de modificación como usuario admin -6
  $user = factory(User::class)->create(['admin'=>true]);
  $variable = factory(Variables::class)->create();

  $response = $this->actingAs($user)
                   ->get("/variable/$variable->id/edit");
  $response->assertStatus(200)
            ->assertSee('Editar Variables');
}


  // public function borrarPuntanjeAdmin(){
  //   // Acceder al borrado como usuario admin -7
  //   $user = factory(User::class)->create([['admin'=>true]]);
  //   $variable = factory(Variables::class)->create();
  //
  //   $response = $this->actingAs($user)
  //                    ->post("/variable/$variable->id/delete");
  //
  //   $response->assertStatus(200)
  //             ->assertDontSee('No tienes permisos');
  // }
}
?>
