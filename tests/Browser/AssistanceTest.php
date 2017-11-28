<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Asistencia;
use App\Bombero;

class AssistanceTest extends DuskTestCase{
  private $usuarioAdmin;
  private $password;

  public function testCreate()
  {
    $this->usuarioAdmin=factory(User::class)->create(['admin'=> '1', 'password'=> bcrypt('123456')]);
    $this->asistencia = factory(Asistencia::class)->make();
    $this->firefighter = factory(Bombero::class)->create();
    $this->browse(function (Browser $browser) {
      $browser->loginAs($this->usuarioAdmin)
              ->visit('/asistencia/create')
              ->type('fecha_reunion', $this->asistencia->fecha_reunion)
              ->click('.off')
              ->press('Finalizar')
              ->assertSee('Reunión del ' . $this->asistencia->fecha_reunion);
    });
  }

  public function testUpdate()
  {
    $this->usuarioAdmin=factory(User::class)->create(['admin'=> '1', 'password'=> bcrypt('123456')]);
    $this->firefighter = factory(Bombero::class)->create();
    $this->asistencia = factory(Asistencia::class)->create(['id_bombero'=> $this->firefighter->id]);
    $this->browse(function (Browser $browser) {
      $browser->loginAs($this->usuarioAdmin)
              ->visit('/asistencia')
              ->click('.glyphicon-edit')
              ->click('.btn-success')
              ->press('Finalizar')
              ->assertDontSee('Reunión del ' . $this->asistencia->fecha_reunion);
    });
  }

  public function testDelete()
  {
    $this->usuarioAdmin=factory(User::class)->create(['admin'=> '1', 'password'=> bcrypt('123456')]);
    $this->firefighter = factory(Bombero::class)->create();
    $this->asistencia = factory(Asistencia::class)->create(['id_bombero'=> $this->firefighter->id]);
    $this->browse(function (Browser $browser) {
      $browser->loginAs($this->usuarioAdmin)
              ->visit('/asistencia')
              ->click('.glyphicon-trash')
              ->assertDontSee('Reunión del ' . $this->asistencia->fecha_reunion);
    });
  }




}
