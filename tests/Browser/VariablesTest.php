<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Database;
use App\Variables;
use App\User;

class VariablesTest extends DuskTestCase
{
  public function testCreate()
  {
    $this->browse(function (Browser $browser) {
      $variable = factory(Variables::class)->make();
      $browser->loginAs(User::find(1))
              ->visit('/variable/create')
              ->type('asistencia', $variable->asistencia)
              ->type('accidentales', $variable->accidentales)
              ->type('guardias', $variable->guardias)
              ->type('year', $variable->year)
              ->press('Crear')
              ->assertSee($variable->year);
    });
  }
  public function testUpdate()
  {
    $this->browse(function (Browser $browser) {
      $variable = factory(Variables::class)->create();
      $variable_edit = factory(Variables::class)->make();
      $browser->loginAs(User::find(1))
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
  public function testDelete()
   {
     $this->browse(function (Browser $browser) {
           $variable = factory(Variables::class)->create();
           $browser->loginAs(User::find(1))
                   ->visit('/variable')
                   ->click('.glyphicon-trash')
                   ->visit('/variable')
                   ->assertDontSee($variable->guardias);
       });
   }
}
