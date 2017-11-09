<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Database;
use App\Bombero;
use App\User;

class ABMBomberosTest extends DuskTestCase
{
     private $userTest;
     private $bomberito;

     function setUp(){
       parent::setUp();
       $this->userTest = factory(User::class)->create(['password'=>bcrypt('123456'), 'admin'=>1]);
     }

    public function testBomberoAlta()
    {
        $this->bomberito = factory(Bombero::class)->make();
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->userTest)
                    ->visit('/bombero/create')
                    ->type('nombre',$this->bomberito->nombre)
                    ->type('apellido',$this->bomberito->apellido)
                    ->type('nro_legajo',$this->bomberito->nro_legajo)
                    ->type('direccion',$this->bomberito->direccion)
                    ->type('telefono',$this->bomberito->telefono)
                    ->type('fecha_nacimiento',$this->bomberito->fecha_nacimiento)
                    ->press('Registrar')
                    ->assertDontSee('required');
      });
    }

    public function testBomberoModificacion()
    {
      $this->bomberito = factory(Bombero::class)->create();
      $this->browse(function (Browser $browser) {
            $browser->loginAs($this->userTest)
                    ->visit('/bombero')
                    ->click('.glyphicon-edit')
                    ->press('Editar')
                    ->assertDontSee('required');
                    $this->userTest->delete();
                    $this->bomberito->delete();
        });
    }

    public function testBomberoBaja()
    {
      $this->bomberito = factory(Bombero::class)->create();
      $this->browse(function (Browser $browser) {
            $browser->loginAs($this->userTest)
                    ->visit('/bombero')
                    ->click('.glyphicon-trash')
                    ->assertDontSee($this->bomberito->nombre);
        });
    }
}
