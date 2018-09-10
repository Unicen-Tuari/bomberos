<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Bombero;
use App\puntuacion;

class ExampleTestDEMO extends TestCase
{

  public function testListScoreControlAccess()
  {
    //Ver listado de puntajes como usuario-1
    $user = factory(User::class)->create();
    $puntuacion= factory(Puntuacion::class)->create();
    //No se si es necesario, supongo que no

    $response = $this->actingAs($user)
                     ->get('/puntuacion/create');

    $response->assertStatus(200)
             ->assertSee('No tienes permisos');
  }

  public function loadUserControlAccess()
  {
    //No acceder a la página de alta como usuario-2
    $user = factory(User::class)->create();
    $firefigther = factory(Bombero::class)->create();

    $response = $this->actingAs($user)
                     ->get('/bombero/create');

    $response->assertStatus(200)
             ->assertSee('No tienes permisos');
  }


  public function modifUserControlAccess()
  {
    //No acceder a la página de modificación como usuario-3
    $user = factory(User::class)->create();
    $firefigther = factory(Bombero::class)->create();

    $response = $this->actingAs($user)
                     ->put("/bombero/$firefigher->id/edit"));

    //Sino lo haria por /bombero/1/edit
    $response->assertStatus(300);
  }

  public function deleteUserControlAccess()
  {
    //No acceder al borrado como usuario-4
    $user = factory(User::class)->create();
    $firefigther = factory(Bombero::class)->create();

    $response = $this->actingAs($user)
                     ->put("/bombero/$firefigher->id/delete");

    $response->assertStatus(300);
  }

  public function scoreControlAdmin()
  {
    //Ver botones de alta, modificar y borrar en listado de puntajes como usuario admin-5
    //Nose si esta pensado para que falle, sino no lo entiendo.
    $user = factory(User::class)->create(['admin'=>true]);
    $firefigther = factory(Bombero::class)->create();

    $response = $this->actingAs($user)
                     ->get("/puntuacion/create")
                     ->assertSee('alta')
                     ->assertSee('modificar')
                     ->assertSee('borrar');

    $response->assertStatus(200);
  }

  public function loadUserControlAdminAccess()
  {
    //Acceder a página de alta como usuario admin-6
    $user = factory(User::class)->create(['admin'=>true]);
    $firefigther = factory(Bombero::class)->create();

    $response->assertStatus(200);
  }

  public function editUserControlAdminAccess()
  {
    //Acceder a página de modificación como usuario admin-7
    $user = factory(User::class)->create(['admin'=>true]);
    $firefigther = factory(Bombero::class)->create();

    $response = $this->actingAs($user)
                     ->put("/bombero/$firefigher->id/edit");
    $response->assertStatus(200);
  }

  public function deleteUserControlAdminAccess()
  {
    //Acceder al borrado como usuario admin-8
    $user = factory(User::class)->create(['admin'=>true]);
    $firefigther = factory(Bombero::class)->create();

    $response = $this->actingAs($user)
                     ->put("/bombero/$firefigher->id/delete");

    $response->assertStatus(200);
  }
}

?>
