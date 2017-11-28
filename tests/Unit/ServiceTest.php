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
        //Setup
        $service = factory(Servicio::class)->create(['tipo_servicio_id'=>1]);
        $service1 = factory(Servicio::class)->create(['tipo_servicio_id'=>2]);
        //Modelo a probar
        $services = Servicio::tipo($service->tipo_servicio_id);
        //Assert
        $this->assertEquals($services->first()->id,$service->id);
        $this->assertEquals($services->first()->tipo_servicio_id,$service->tipo_servicio_id);
        $this->assertEquals($services->count(),1);
    }

    public function testScopeTipoAlarma()
    {
        //Setup
        $service = factory(Servicio::class)->create(['tipo_alarma'=>1]);
        $service1 = factory(Servicio::class)->create(['tipo_alarma'=>2]);
        //Modelo a probar
        $services = Servicio::tipoAlarma($service->tipo_alarma);
        //Assert
        $this->assertEquals($services->first()->id,$service->id);
        $this->assertEquals($services->first()->tipo_alarma,$service->tipo_alarma);
        $this->assertEquals($services->count(),1);
    }

    public function testScopeFecha()
    {
        //Setup
        $horaRegreso1 = new DateTime("2015-11-01 00:00:00", new DateTimeZone("America/New_York"));
        $horaRegreso2 = new DateTime("2016-12-01 00:00:00", new DateTimeZone("America/New_York"));
        $horaRegreso3 = new DateTime("2013-12-01 00:00:00", new DateTimeZone("America/New_York"));


        $service1 = factory(Servicio::class)->create(['hora_regreso'=>$horaRegreso1->format("Y-m-d H:i:s")]);
        $service2 = factory(Servicio::class)->create(['hora_regreso'=>$horaRegreso2->format("Y-m-d H:i:s")]);
        $service3 = factory(Servicio::class)->create(['hora_regreso'=>$horaRegreso3->format("Y-m-d H:i:s")]);

        //Modelo a probar
        $servicesYear = Servicio::Fecha(null,'2015');
        $servicesMonth = Servicio::Fecha('12', null);
        $servicesMonthYear = Servicio::Fecha('12', '2013');
        //Assert
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
}
