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
                       ->get('/home');

      $response->assertStatus(200)
               ->assertDontSee('Lista de usuarios');
    }

    public function testShowUserMenuAsAdmin()
    {
      $user = factory(\App\User::class)->create(['admin'=>true]);

      $response = $this->actingAs($user)
                       ->get('/home');

      $response->assertStatus(200)
               ->assertSee('Lista de usuarios');
    }

    public function testShowUserAdd()
    {
      $user = factory(\App\User::class)->create();
    

      $response = $this->actingAs($user)
                       ->get('/home');

      $response->assertStatus(200)
               ->assertDontSee('Alta usuario');
    }

    public function testShowUserAddAsAdmin()
    {
      $user = factory(\App\User::class)->create(['admin'=>true]);

      $response = $this->actingAs($user)
                       ->get('/home');

      $response->assertStatus(200)
               ->assertSee('Alta usuario');
    }
}
