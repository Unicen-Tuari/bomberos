<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class UserTest extends DuskTestCase
{
    private $newUser;

    function setUp() {
      parent::setUp();
      $this->newUser = factory(User::class)->make();
    }

    function tearDown() {
      $this->newUser->delete();
    }
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreate() {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('nombre', $this->newUser->nombre)
                    ->type('apellido', $this->newUser->apellido)
                    ->type('usuario', $this->newUser->usuario)
                    ->type('password', $this->newUser->password)
                    ->type('password_confirmation', $this->newUser->password)
                    ->press('Registrar')
                    ->assertSee($this->newUser->nombre);
        });
    }
}
