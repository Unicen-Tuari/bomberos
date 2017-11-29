<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Database;
use App\Bombero;
use App\User;
use App\Reemplazo;

class SubstitutionTest extends DuskTestCase
{
    public function testSubstitutionCreate()
    {
        $this->browse(function (Browser $browser) {
            $bombero = factory(Bombero::class)->create();
            $bomberoReemplazo = factory(Bombero::class)->create();
            $reemplazo = factory(Reemplazo::class)->make();
            $browser->loginAs(User::find(1))
                    ->visit('/reemplazo/create')
                    ->select('bombero', $bombero->nombre)
                    ->select('bombero_reemplazo', $bomberoReemplazo->nombre)
                    ->type('fecha_inicio', $reemplazo->fecha_inicio)
                    ->type('fecha_fin', $reemplazo->fecha_fin)
                    ->type('razon', $reemplazo->razon)
                    ->press('Registrar')
                    ->assertSee($bombero->nombre)
                    ->assertSee($bomberoReemplazo->nombre);
        });
    }

    public function testSubstitutionUpdate()
    {
        $this->browse(function (Browser $browser){
            $reemplazo = factory(Reemplazo::class)->create();
            $newBombero = factory(Bombero::class)->create();
            $newBomberoReemplazo = factory(Bombero::class)->create();
            $reemplazoEdit = factory(Reemplazo::class)->make();
            $browser->loginAs(User::find(1))
                    ->visit('/reemplazo')
                    ->click('.glyphicon-edit')
                    ->select('bombero', $newBombero->nombre)
                    ->select('bombero_reemplazo', $newBomberoReemplazo->nombre)
                    ->type('fecha_inicio', $reemplazoEdit->fecha_inicio)
                    ->type('fecha_fin', $reemplazoEdit->fecha_fin)
                    ->type('razon', $reemplazoEdit->razon)
                    ->press('Editar')
                    ->assertSee($newBombero->nombre)
                    ->assertSee($newBomberoReemplazo->nombre);
        });
    }

    public function testSubstitutionDelete()
    {
        $this->browse(function (Browser $browser){
            $bombero = factory(Bombero::class)->create();
            $reemplazo = factory(Reemplazo::class)->create(['id_bombero'=>$bombero->id]);
            $browser->loginAs(User::find(1))
                    ->visit('/reemplazo')
                    ->click('.glyphicon-trash')
                    ->assertDontSee($bombero->nombre);
        });
    }
}
