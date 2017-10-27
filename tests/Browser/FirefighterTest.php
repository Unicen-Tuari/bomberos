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
       private $userTest;
       private $firefighter;

       function setUp(){
         parent::setUp();
         $this->userTest = factory(User::class)->create(['password'=>bcrypt('123456'), 'admin'=>1]);
         $this->browse(function (Browser $browser) {
               $browser->visit('/login')
                       ->type('usuario', $this->userTest->usuario)
                       ->type('password', '123456')
                       ->press('Iniciar sesión');
        });
      }

      public function tearDown()
      {
        $this->userTest->delete();
        $this->firefighter->delete();
      }

      public function testFirefighterCreate()
      {
        $this->firefighter = factory(Bombero::class)->make();
        $this->browse(function (Browser $browser) {
              $browser->visit('/bombero/create')
                      ->type('nombre',$this->firefighter->nombre)
                      ->type('apellido',$this->firefighter->apellido)
                      ->type('nro_legajo',$this->firefighter->nro_legajo)
                      ->type('direccion',$this->firefighter->direccion)
                      ->type('telefono',$this->firefighter->telefono)
                      ->type('fecha_nacimiento',$this->firefighter->fecha_nacimiento)
                      ->press('Registrar')
                      ->assertDontSee('required');
        });
      }

      public function testFirefighterUpdate()
      {
        $this->firefighter = factory(Bombero::class)->create();
        $this->browse(function (Browser $browser) {
              $browser->visit('/bombero')
                      ->click('.glyphicon-edit')
                      ->press('Editar')
                      ->assertDontSee('required');
              });
      }

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
  }
