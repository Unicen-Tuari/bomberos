<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Material;

class MaterialTest extends TestCase
{
    public function testScopeMaterial()
    {
        $material = factory(Material::class)->create(['nombre'=>'test1']);
        $material2 = factory(Material::class)->create(['nombre'=>'test2']);
        $materialModel = Material::material($material->nombre);
        $this->assertEquals($materialModel->first()->id, $material->id);
        $this->assertEquals($materialModel->first()->nombre, $material->nombre);
        $this->assertEquals($materialModel->count(),1);
    }
    public function testScopeRubro()
    {
        $material = factory(Material::class)->create(['rubro'=>1]);
        $material2 = factory(Material::class)->create(['rubro'=>2]);
        $materialModel = Material::rubro($material->rubro);
        $this->assertEquals($materialModel->first()->id, $material->id);
        $this->assertEquals($materialModel->first()->rubro, $material->rubro);
        $this->assertEquals($materialModel->count(),1);
    }
    public function testScopeMovil()
    {
        $material = factory(Material::class)->create(['vehiculo_id'=>1]);
        $material2 = factory(Material::class)->create(['vehiculo_id'=>2]);
        $materialModel = Material::movil($material->vehiculo_id);
        $this->assertEquals($materialModel->first()->id, $material->id);
        $this->assertEquals($materialModel->first()->vehiculo_id, $material->vehiculo_id);
        $this->assertEquals($materialModel->count(),1);
    }
}
