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
        $materialModel = Material::material($material->nombre);
        $this->assertEquals($materialModel->first()->nombre, $material->nombre);
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
