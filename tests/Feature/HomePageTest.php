<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
class HomePageTest extends TestCase
{
    public function testHomeAsAdmin()
    {
      $user = factory(User::class)->create(['admin'=>true]);

      $response = $this->actingAs($user)
                       ->get('/');

      $response->assertStatus(200)
                ->assertSee($user->nombre)
                ->assertSee('Llamada')
                ->assertSee('Activos')
                ->assertSee('Cargar servicio')
                ->assertSee('Últimos');
    }

    public function testHome()
    {
      $user = factory(User::class)->create(['admin'=>false]);

      $response = $this->actingAs($user)
                       ->get('/');

      $response->assertStatus(200)
                ->assertSee($user->nombre)
                ->assertDontSee('Llamada')
                ->assertDontSee('Activos')
                ->assertDontSee('Cargar servicio')
                ->assertSee('Últimos');
    }

    public function testHomeNoUser()
    {
      $response = $this->get('/');
      $response->assertStatus(200)
                ->assertSee('Iniciar sesión');
    }
}
