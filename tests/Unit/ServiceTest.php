<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Servicio;
use DateTime;
use DateTimeZone;

class ServiceTest extends TestCase
{

    public function testScopeTipo()
    {
        $service = factory(Servicio::class)->create(['tipo_servicio_id'=>1]);
        $service1 = factory(Servicio::class)->create(['tipo_servicio_id'=>2]);
        $services = Servicio::tipo($service->tipo_servicio_id);
        $this->assertEquals($services->first()->id,$service->id);
        $this->assertEquals($services->first()->tipo_servicio_id,$service->tipo_servicio_id);
        $this->assertEquals($services->count(),1);
    }

    public function testScopeTipoAlarma()
    {
        $service = factory(Servicio::class)->create(['tipo_alarma'=>1]);
        $service1 = factory(Servicio::class)->create(['tipo_alarma'=>2]);
        $services = Servicio::tipoAlarma($service->tipo_alarma);
        $this->assertEquals($services->first()->id,$service->id);
        $this->assertEquals($services->first()->tipo_alarma,$service->tipo_alarma);
        $this->assertEquals($services->count(),1);
    }

    public function testScopeFecha()
    {
        $horaRegreso1 = new DateTime("2015-11-01 00:00:00", new DateTimeZone("America/New_York"));
        $horaRegreso2 = new DateTime("2016-12-01 00:00:00", new DateTimeZone("America/New_York"));
        $horaRegreso3 = new DateTime("2013-12-01 00:00:00", new DateTimeZone("America/New_York"));
        $service1 = factory(Servicio::class)->create(['hora_regreso'=>$horaRegreso1->format("Y-m-d H:i:s")]);
        $service2 = factory(Servicio::class)->create(['hora_regreso'=>$horaRegreso2->format("Y-m-d H:i:s")]);
        $service3 = factory(Servicio::class)->create(['hora_regreso'=>$horaRegreso3->format("Y-m-d H:i:s")]);
        $servicesYear = Servicio::Fecha(null,'2015');
        $servicesMonth = Servicio::Fecha('12', null);
        $servicesMonthYear = Servicio::Fecha('12', '2013');
        $this->assertEquals($servicesYear->first()->id,$service1->id);
        $this->assertEquals($servicesYear->first()->hora_regreso, $service1->hora_regreso);
        $this->assertEquals($servicesYear->count(),1);
        $this->assertEquals($servicesMonth->first()->id,$service2->id);
        $this->assertEquals($servicesMonth->first()->hora_regreso, $service2->hora_regreso);
        $this->assertEquals($servicesMonth->count(),2);
        $this->assertEquals($servicesMonthYear->first()->id,$service3->id);
        $this->assertEquals($servicesMonthYear->first()->hora_regreso, $service3->hora_regreso);
        $this->assertEquals($servicesMonthYear->count(),1);
    }

    public function testScopeFechaAlarma()
    {
        $horaAlarma = new DateTime("2015-11-01 00:00:00", new DateTimeZone("America/New_York"));
        $service = factory(Servicio::class)->create(['hora_alarma'=>$horaAlarma->format("Y-m-d H:i:s")]);
        $servicesMonthYear = Servicio::FechaAlarma('12', '2013');
        $servicesMonthYear2 = Servicio::FechaAlarma('11', '2015');
        $this->assertEquals($servicesMonthYear->count(),0);
        $this->assertEquals($servicesMonthYear2->count(),1);
      }

      public function testScopeFechaAlarmaPeriodo()
      {
          $horaAlarma = new DateTime("2016-10-01 00:00:00", new DateTimeZone("America/New_York"));
          $horaAlarma2 = new DateTime("2012-11-01 00:00:00", new DateTimeZone("America/New_York"));

          $service = factory(Servicio::class)->create(['hora_alarma'=>$horaAlarma->format("Y-m-d H:i:s")]);
          $service2 = factory(Servicio::class)->create(['hora_alarma'=>$horaAlarma->format("Y-m-d H:i:s")]);
          $service3 = factory(Servicio::class)->create(['hora_alarma'=>$horaAlarma2->format("Y-m-d H:i:s")]);

          $servicesMonthYear = Servicio::FechaAlarmaPeriodo('10', '2012', '11', '2014');
          $servicesMonthYear2 = Servicio::FechaAlarmaPeriodo('01', '2014', '01', '2016');

          $this->assertEquals($servicesMonthYear->count(),1);
          $this->assertEquals($servicesMonthYear2->count(),0);
        }
}
