<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class UserTest extends DuskTestCase
{
    public function testUserCreate() {
        $this->browse(function (Browser $browser) {
            $newUser = factory(User::class)->make();
            $browser->visit('/register')
                    ->type('nombre', $newUser->nombre)
                    ->type('apellido', $newUser->apellido)
                    ->type('usuario', $newUser->usuario)
                    ->type('password', $newUser->password)
                    ->type('password_confirmation', $newUser->password)
                    ->press('Registrar')
                    ->assertSee($newUser->nombre);
        });
    }
}
