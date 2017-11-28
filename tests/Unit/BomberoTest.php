<?php
namespace Tests\Unit;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Bombero;

class BomberoTest extends TestCase
{
    public function testScopeNombre()
    {
        $newBombero = factory(Bombero::class)->create();
        $newBomberoModel = Bombero::Nombre($newBombero->nombre);
        $this->assertEquals($newBomberoModel->first()->nombre,$newBombero->nombre);
    }

    public function testScopeLegajo()
    {
        $newBombero = factory(Bombero::class)->create();
        $newBomberoModel = Bombero::Legajo($newBombero->Legajo);
        $this->assertEquals($newBomberoModel->first()->legajo,$newBombero->legajo);
    }

    // public function testScopeLegajo()
    // {
    //     $newBombero = factory(Bombero::class)->create();
    //     $newBomberoModel = Bombero::Legajo($newBombero->Legajo);
    //     $this->assertEquals($newBomberoModel->first()->legajo,$newBombero->legajo);
    // }

    public function testScopeJerarquia()
    {
        $newBombero = factory(Bombero::class)->create();
        $newBomberoModel = Bombero::Jerarquia($newBombero->jerarquia);
        $this->assertEquals($newBomberoModel->first()->Jerarquia,$newBombero->jerarquia);
    }

}
