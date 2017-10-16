<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ABM_Materials extends DuskTestCase
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
                    ->visit('/material/create')
                    ->assertSee('Nombre');
        });
    }
}
