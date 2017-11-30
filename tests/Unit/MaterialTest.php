<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Material;

class MaterialTest extends TestCase
{
    public function testScopeMaterial()
    {
        $material = factory(Material::class)->create();
        $material2 = factory(Material::class)->create();
        $materialModel = Material::material($material->nombre);
        $this->assertEquals($materialModel->first()->nombre, $material->nombre);

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
    public function testScopeRubro()
    {
        $material = factory(Material::class)->create();
        $materialModel = Material::rubro($material->rubro);
        $this->assertEquals($materialModel->first()->rubro, $material->rubro);
    }
    public function testScopeMovil()
    {
        $material = factory(Material::class)->create();
        $materialModel = Material::movil($material->vehiculo_id);
        $this->assertEquals($materialModel->first()->vehiculo_id, $material->vehiculo_id);
    }
}
