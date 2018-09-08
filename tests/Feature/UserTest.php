<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{

    public function testShowUserMenu()
    {
      $user = factory(\App\User::class)->create();
    

      $response = $this->actingAs($user)
                       ->get('/usuario');

      $response->assertStatus(200)
               ->assertDontSee('Usuarios')
               ->assertSee('No tiene permisos');
    }

    public function testShowUserMenuAsAdmin()
    {
      $user = factory(\App\User::class)->create(['admin'=>true]);

      $response = $this->actingAs($user)
                       ->get('/usuario');

      $response->assertStatus(200)
               ->assertSee('Usuarios');
    }

    public function testShowUserListMenu()
    {
      $user = factory(\App\User::class)->create();
    

      $response = $this->actingAs($user)
                       ->get('/usuario');

      $response->assertStatus(200)
               ->assertDontSee('Lista de usuarios');
    }

    public function testShowUserListMenuAsAdmin()
    {
      $user = factory(\App\User::class)->create(['admin'=>true]);

      $response = $this->actingAs($user)
                       ->get('/usuario');

      $response->assertStatus(200)
               ->assertSee('Lista de usuarios');
    }

    public function testShowUserAdd()
    {
      $user = factory(\App\User::class)->create();
    

      $response = $this->actingAs($user)
                       ->get('/usuario/create');

      $response->assertStatus(200)
               ->assertSee('No tienes permisos');
    }

    public function testShowUserAddAsAdmin()
    {
      $user = factory(\App\User::class)->create(['admin'=>true]);

      $response = $this->actingAs($user)
                       ->get('/usuario/create');

      $response->assertStatus(200)
               ->assertSee('Alta usuario');
    }

    public function testEditUsuario()
    {
      $user = factory(\App\User::class)->create();

      $response = $this->actingAs($user)
                       ->get("/usuario/$user->id/edit");

      $response->assertStatus(200)
               ->assertSee('No tienes permisos');
    }

    public function testEditUsuarioAsAdmin()
    {
      $user = factory(\App\User::class)->create(['admin'=>true]);

      $response = $this->actingAs($user)
                       ->get("/usuario/$user->id/edit");

      $response->assertStatus(200)
               ->assertSee('Editar');
    }
}
