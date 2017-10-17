<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Database;
use App\Bombero;

class ABMBomberosTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testBomberoAlta()
    {
      //$bomberito = factory(Bombero::class)->make();
        $this->browse(function (Browser $browser) {
            $browser->visit('/bombero/create')
                    ->type('usuario','gastonp')
                    ->type('password','123456')
                    ->press('Iniciar')
                    ->type('nombre','elnombre')//$bomberito->nombre)
                    ->type('apellido','elapellido')//$bomberito->apellido)
                    ->type('nro_legajo','9876')//$bomberito->nro_legajo)
                    ->type('direccion','ladireccion 1')//$bomberito->direccion)
                    ->type('telefono','21343245456')//$bomberito->telefono)
                    ->type('fecha_nacimiento','10/10/1986')//$bomberito->fecha_nacimiento)
                    ->press('Registrar')
                    ->assertDontSee('required');
        });
    }
}
