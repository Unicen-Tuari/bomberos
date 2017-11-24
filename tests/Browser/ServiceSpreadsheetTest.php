<?php

namespace Tests\Browser;

use Illuminate\Database\Seeder;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Servicio;
use App\User;

class ServiceSpreadsheetTest extends DuskTestCase
{
	public function testSeePlanilla()
	{
		$this->browse(function (browser $browser){
			$servicio = factory(Servicio::class)->create();
			$browser->loginAs(User::find(1))
			->visit('/servicio')
			->click('.glyphicon-list-alt')
			->assertDontSee('No hay datos cargados');
		});
	}
}
