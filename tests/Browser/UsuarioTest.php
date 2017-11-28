<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class UsuarioTest extends DuskTestCase
{
    public function testCreateUser() {
        $this->newUser = factory(User::class)->create();
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/usuario/create')
                    ->type('nombre', $this->newUser->nombre)
                    ->type('apellido', $this->newUser->apellido)
                    ->type('usuario', $this->newUser->usuario)
                    ->type('password', $this->newUser->password)
                    ->press('Guardar')
                    ->assertDontSee('required');
        });
    }

    public function testUpdateUser(){
          $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/usuario')
                    ->click('.glyphicon-edit')
                    ->press('Guardar')
                    ->assertDontSee('required');
            });
    }

    public function testDeleteUser(){
      $this->newUser = factory(User::class)->create();
      $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/usuario')
                    ->type('id',$this->newUser->id)
                    ->press('Buscar')
                    ->click('.glyphicon-trash')
                    ->type('id',$this->newUser->id)
                    ->press('Buscar')
                    ->assertDontSee($this->newUser->id);
        });
    }

}
