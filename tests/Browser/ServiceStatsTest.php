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
	use DatabaseMigrations;
	
	public function testMenuRecopiladora()
	{
		$this->browse(function (browser $browser){
			$browser->loginAs(\App\User::find(1))
                ->visit('/')
                ->click('#servicioMenu')
                ->whenAvailable('#serviciosSubMenu', function($submenu){
                    $submenu->assertSee('Recopiladora');
                });
		});
	}

	public function testRecopiladora()
	{
		$this->browse(function (browser $browser){
			$browser->loginAs(\App\User::find(1))
				->visit('/servicio/estadistica')
				->assertSee('Recopiladora');
		});
	}

	public function testTablaVacia()
	{
		$this->browse(function (browser $browser){
			$browser->loginAs(User::find(1))
			->visit('/servicio/estadistica')
			->whenAvailable('.table-bordered', function($table){
				$table->assertSee('Estadísticas período desde');
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
			->select('monthSince', '1')
			->select('monthUntil', '12')
			->whenAvailable('.table-bordered', function($table){
				$table->assertSee('Estadísticas período desde');
				$table->assertSee('35');
				$table->assertSee('22');
				$table->assertSee('57');
			});
		});
	}
}
