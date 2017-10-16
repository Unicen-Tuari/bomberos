<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class materialsABM_test extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
     public function testLogin()
     {
         $this->browse(function (Browser $browser) {
             $browser->visit('/login')
                     ->type('usuario', 'fsamartino')
                     ->type('password', '123456')
                     ->press('Iniciar sesión')
                     ->assertSee('Facundo');
         });
     }
     public function testAlta()
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

      public function testModificacion()
      {
        $this->browse(function (Browser $browser) {
          $browser->visit('/material')
                  ->assertSee('Nombre');

       });
    }

    public function testBaja()
    {
      $this->browse(function (Browser $browser) {
        $browser->visit('/material')
                ->assertSee('Nombre');

     });
   }
}
