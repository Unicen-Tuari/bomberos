<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
class materialsABM_test extends DuskTestCase
{
  protected $usuarioAdmin;
    /**
     * A Dusk test example.
     *
     * @return void
     */
     public function setUp()
     {
       parent::setUp();
       $this->usuarioAdmin=factory(User::class)->create(['admin'=> '1', 'password'=> bcrypt('123456')]);
     }

     public function testLogin()
     {
      $this->browse(function (Browser $browser) {
          $browser->visit('/login')
                  ->type('usuario', $this->usuarioAdmin->usuario)
                  ->type('password', '123456')
                  ->press('Iniciar sesión')
                  ->assertSee($this->usuarioAdmin->nombre);
         });
     }

    public function testUp()
    {
       $this->browse(function (Browser $browser) {
         $browser->visit('/material/create')
                 ->type('nombre', 'pruebaTest')
                 ->select('vehiculo_id', '2')
                 ->select('rubro', 'INCENDIO')
                 ->type('detalle', 'Este test verifica el alta de un material')
                 ->press('Registrar')
                 ->assertSee('pruebaTest');
      });
   }

    public function testModify()
    {
      $this->browse(function (Browser $browser) {
        $browser->click('.glyphicon-edit')
        //->visit('/material/111/edit')
                ->clear('nombre')
                ->type('nombre', 'pruebaModificacionTest')
                ->select('vehiculo_id', '4')
                ->select('rubro', '4')
                ->clear('detalle')
                ->type('detalle', 'Este test verifica la modificacion de un material')
                ->press('Editar')
                ->visit('/material')
                ->assertSee('pruebaModificacionTest');
     });
   }

    public function testBaja()
    {
      $this->browse(function (Browser $browser) {
        $browser->visit('/material')
                ->click('.glyphicon-trash')
                ->visit('/material')
                ->assertDontSee('pruebaModificacionTest');

     });
   }
}
