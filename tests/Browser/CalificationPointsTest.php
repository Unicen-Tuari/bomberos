<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CalificationPointsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testMenu()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(\App\User::find(1))
                ->visit('/')
                ->click('#puntuacionMenu')
                ->whenAvailable('#puntuacionSubMenu', function($submenu){
                    $submenu->assertSee('Puntaje por calificación');
                });
        });
    }

    public function testCalificationList()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(\App\User::find(1))
                ->visit('/variable')
                ->assertSee('Lista de puntaje por calificación')
                ->assertSee('Orden interno');
        });
    }
}
