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
			->with('.table-bordered', function($table){
				$table->assertSee('Estadisticas Periodo');
				$table->assertSee('0');
			});
		});
	}

	public function testTablaConValores()
	{
		$this->servicio = factory(Servicio::class)->create(['quemados'=> 35,'hora_alarma'=> '2017-12-10 11:30:00']);
		$this->servicio2 = factory(Servicio::class)->create(['quemados'=> 22,'hora_alarma'=> '2017-05-10 11:30:00']);
		$this->browse(function (browser $browser){
			$browser->loginAs(User::find(1))
			->visit('/servicio/estadistica')
			->select('monthSince', '1')//meses
			->select('monthUntil', '12')
			->assertDontSee('Error al Cargar la tabla ')
			->with('.table-bordered', function($table){
				$table->assertSee('Estadisticas Periodo');
				$table->assertSee('35');
				$table->assertSee('22');
				$table->assertSee('57');
			});
		});
	}
}
