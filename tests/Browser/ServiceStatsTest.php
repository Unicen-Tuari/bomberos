<?php

namespace Tests\Browser;

use Illuminate\Database\Seeder;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Servicio;
use App\User;

class ServiceStatsTest extends DuskTestCase
{
	public function testTablaVacia()
	{
		$this->browse(function (browser $browser){
			$browser->loginAs(User::find(1))
			->visit('/servicio/estadistica')
			->assertDontSee('Error al Cargar la tabla ')
			->assertSee('Estadisticas de ');
			->assertSee('0');
		});
	}

	// public function testTablaVacia()
	// {
	// 	$this->browse(function (browser $browser){
	// 		$servicio = factory(Servicio::class)->create();
	// 		$browser->loginAs(User::find(1))
	// 		->visit('/servicio/estadistica')
	// 		->assertDontSee('Error al Cargar la tabla ');
	// 		->assertSee('0');
	// 	});
	// }
}
