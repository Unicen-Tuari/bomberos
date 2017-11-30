<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Servicio;
use App\Bombero;
use App\BomberoServicio;
use DateTime;
use DateTimeZone;

class BomberoServicioTest extends TestCase
{
  public function testBombero()
  {
      $bombero = factory(Bombero::class)->create();
      $bomberoServicio = factory(BomberoServicio::class)->create(['bombero_id'=>$bombero->id]);
      $bomberoServicioModel = BomberoServicio::find($bomberoServicio->bombero_id)->bombero;
      $this->assertEquals($bomberoServicio->bombero_id,$bombero->id);
  }

  public function testServicio()
  {
      $servicio = factory(Servicio::class)->create();
      $bomberoServicio = factory(BomberoServicio::class)->create(['servicio_id'=>$servicio->id]);
      $bomberoServicioModel = BomberoServicio::find($bomberoServicio->servicio_id)->servicio;
      $this->assertEquals($bomberoServicio->servicio_id,$servicio->id);
  }
}
