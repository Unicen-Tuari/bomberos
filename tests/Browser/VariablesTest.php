<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Variable;

class ABMVariablesTest extends DuskTestCase
{
  protected $usuarioAdmin;

  public function setUp()
  {
    parent::setUp();
    $this->usuarioAdmin=factory(User::class)->create(['admin'=> '1', 'password'=> bcrypt('123456')]);
  }

  public function tearDown()
  {
    $this->usuarioAdmin->delete();
  }

  public function testCreate()
  {
    $this->browse(function (Browser $browser) {
      $variable = factory(Variable::class)->make();
      $browser->loginAs($this->usuarioAdmin)
              ->visit('/variable/create')
              ->type('asistencia', $variable->asistencia)
              ->type('accidentales', $variable->accidentales)
              ->type('guardias', $variable->guardias)
              ->type('anio', $variable->anio)
              ->press('Crear')
              ->assertSee($variable->anio);
    });
  }

  public function testUpdate()
  {
    $this->browse(function (Browser $browser) {
      $variable = factory(Variable::class)->create();
      $variable_edit = factory(Variable::class)->make();
      $browser->loginAs($this->usuarioAdmin)
              ->visit('/variable')
              ->click('.glyphicon-edit')
              ->clear('asistencia')
              ->type('asistencia', $variable_edit->asistencia)
              ->clear('accidentales')
              ->type('accidentales', $variable_edit->accidentales)
              ->clear('guardias')
              ->type('guardias', $variable_edit->guardias)
              ->press('Editar')
              ->visit('/variable')
              ->assertSee($variable_edit->asistencia)
              ->assertSee($variable_edit->accidentales)
              ->assertSee($variable_edit->guardias);
    });
  }
}
