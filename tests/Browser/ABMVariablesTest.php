<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
class ABMVariablesTest extends DuskTestCase
{
  protected $usuarioAdmin;

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
      $browser->visit('/variable/create')
      ->type('asistencia', '35')
      ->type('accidentales', '35')
      ->type('guardias', '35')
      ->type('anio', '3456789')
      ->press('Crear')
      ->assertSee('3456789');
    });
  }

  public function testUpdate()
  {
    $this->browse(function (Browser $browser) {
      $browser->visit('/variable')
      ->click('.glyphicon-edit')
      ->clear('asistencia')
      ->type('asistencia', '9876541')
      ->clear('accidentales')
      ->type('accidentales', '9876542')
      ->clear('guardias')
      ->type('guardias', '9876543')
      ->press('Editar')
      ->visit('/variable')
      ->assertSee('9876541')
      ->assertSee('9876542')
      ->assertSee('9876543');
    });
  }
}
