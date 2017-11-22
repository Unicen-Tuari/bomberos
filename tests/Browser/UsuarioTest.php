<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class ABMUsuarioTest extends DuskTestCase
{
    private $newUser;

    function setUp(){
      parent::setUp();
      $this->userTest = factory(User::class)->create(['password'=>bcrypt('123456'), 'admin'=>1]);
      $this->newUser = factory(User::class)->make(['password'=> '1596321']);
      }

    function tearDown() {
      $this->newUser->delete();

      }


    public function testCreateUser() {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->userTest)
                    ->visit('/usuario/create')
                    ->type('nombre', $this->newUser->nombre)
                    ->type('apellido', $this->newUser->apellido)
                    ->type('usuario', $this->newUser->usuario)
                    ->type('password', $this->newUser->password)
                    ->press('Guardar')
                    ->assertDontSee('required');
        });
    }

    public function testUpdateUser()
    {
      $this->newUser = factory(User::class)->create(['admin'=>1]);
      $this->browse(function (Browser $browser) {
            $browser->loginAs($this->userTest)
                    ->visit('/usuario')
                    ->click('.glyphicon-edit')
                    ->press('Guardar')
                    ->assertDontSee('required');
            });
    }
/*
    public function testFirefighterDelete()
    {
      $this->firefighter = factory(Bombero::class)->create();
      $this->browse(function (Browser $browser) {
            $browser->visit('/bombero')
                    ->type('legajo',$this->firefighter->nro_legajo)
                    ->press('Buscar')
                    ->click('.glyphicon-trash')
                    ->type('legajo',$this->firefighter->nro_legajo)
                    ->press('Buscar')
                    ->assertDontSee($this->firefighter->nombre);
        });
    }



*/




}
