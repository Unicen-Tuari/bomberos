<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
class MaterialsTest extends DuskTestCase
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
       $this->browse(function (Browser $browser) {
             $browser->visit('/login')
                     ->type('usuario', $this->usuarioAdmin->usuario)
                     ->type('password', '123456')
                     ->press('Iniciar sesión');
              });
       }

    public function tearDown()
    {
      $this->usuarioAdmin->delete();
    }

    public function testCreate()
    {
       $this->browse(function (Browser $browser) {
         $browser->visit('/material/create')
                 ->type('nombre', 'manguera')
                 ->select('vehiculo_id', '8')
                 ->select('rubro', 'INCENDIO')
                 ->type('detalle', 'Este test verifica el alta de un material')
                 ->press('Registrar')
                 ->assertSee('manguera');
      });
   }

    public function testUpdate()
    {
      $this->browse(function (Browser $browser) {
        $browser->visit('/material')
                ->click('.glyphicon-edit')
                ->clear('nombre')
                ->type('nombre', 'mangueraModificada')
                ->select('vehiculo_id', '7')
                ->select('rubro', '4')
                ->clear('detalle')
                ->type('detalle', 'Este test verifica la modificacion de un material')
                ->press('Editar')
                ->visit('/material')
                ->assertSee('mangueraModificada');
     });
   }

    public function testDelete()
    {
      $this->browse(function (Browser $browser) {
        $browser->visit('/material')
                ->click('.glyphicon-trash')
                ->visit('/material')
                ->assertDontSee('mangueraModificada');
     });
   }
}
