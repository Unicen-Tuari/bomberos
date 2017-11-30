<?php
namespace Tests\Unit;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Bombero;

class BomberoTest extends TestCase
{
    public function testScopeNombre()
    {
        $newBombero = factory(Bombero::class)->create(['nombre'=>'ruben']);
        $newBombero2 = factory(Bombero::class)->create(['nombre'=>'dario']);
        $newBomberoModel = Bombero::Nombre($newBombero->nombre);
        $this->assertEquals($newBomberoModel->first()->nombre,$newBombero->nombre);
        $this->assertEquals($newBomberoModel->count(),1);
    }

    public function testScopeLegajo()
    {
        $newBombero = factory(Bombero::class)->create(['nro_legajo'=>'849302']);
        $newBombero2 = factory(Bombero::class)->create(['nro_legajo'=>'632818']);
        $newBomberoModel = Bombero::Legajo($newBombero->nro_legajo);
        $this->assertEquals($newBomberoModel->first()->nro_legajo,$newBombero->nro_legajo);
        $this->assertEquals($newBomberoModel->count(),1);
    }

    public function testScopeJerarquia()
    {
        $newBombero = factory(Bombero::class)->create(['jerarquia'=>'3']);
        $newBombero2 = factory(Bombero::class)->create(['jerarquia'=>'1']);
        $newBomberoModel = Bombero::Jerarquia($newBombero->jerarquia);
        $this->assertEquals($newBomberoModel->first()->jerarquia,$newBombero->jerarquia);
        $this->assertEquals($newBomberoModel->count(),1);
    }

    public function testGetBomberos()
    {
        $newBombero = factory(Bombero::class)->create(['nombre'=>'gerardo', 'apellido'=>'perez']);
        $newBombero2 = factory(Bombero::class)->create(['nombre'=>'carlos', 'apellido'=>'perez']);
        $newBomberoModel = Bombero::getBomberos();
        $this->assertNotEquals(count($newBomberoModel),2);
    }
}
