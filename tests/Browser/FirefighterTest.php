<?php
namespace Tests\Browser;

  use Tests\DuskTestCase;
  use Laravel\Dusk\Browser;
  use Illuminate\Foundation\Testing\DatabaseMigrations;
  use Illuminate\Database;
  use App\Bombero;
  use App\User;

  class FirefighterTest extends DuskTestCase
  {

      public function testFirefighterCreate()
      {
        $this->browse(function (Browser $browser) {
              $firefighter = factory(Bombero::class)->make();
              $browser->loginAs(User::find(1))
                      ->visit('/bombero/create')
                      ->type('nombre',$firefighter->nombre)
                      ->type('apellido',$firefighter->apellido)
                      ->type('nro_legajo',$firefighter->nro_legajo)
                      ->type('direccion',$firefighter->direccion)
                      ->type('telefono',$firefighter->telefono)
                      ->type('fecha_nacimiento',$firefighter->fecha_nacimiento)
                      ->press('Registrar')
                      ->assertDontSee('required');
        });
      }

      public function testFirefighterUpdate()
      {
        $this->browse(function (Browser $browser) {
              $firefighter = factory(Bombero::class)->create();
              $firefighter_edit = factory(Bombero::class)->make();
              $browser->loginAs(User::find(1))
                      ->visit('/bombero')
                      ->click('.glyphicon-edit')
                      ->type('nombre', $firefighter_edit->nombre)
                      ->type('apellido', $firefighter_edit->apellido)
                      ->type('nro_legajo', $firefighter_edit->nro_legajo)
                      ->press('Editar')
                      ->assertSee($firefighter_edit->nombre)
                      ->assertSee($firefighter_edit->nro_legajo);
              });
      }

      public function testFirefighterDelete()
      {
        $this->browse(function (Browser $browser) {
              $firefighter = factory(Bombero::class)->create();
              $browser->loginAs(User::find(1))
                      ->visit('/bombero')
                      ->click('.glyphicon-trash')
                      ->assertDontSee($firefighter->nombre);
          });
      }
  }
