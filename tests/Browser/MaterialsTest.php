<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Material;

class MaterialsTest extends DuskTestCase
{
  public function testCreate()
  {
    $this->browse(function (Browser $browser) {
      $material = factory(Material::class)->make();
      $browser->loginAs(User::find(1))
              ->visit('/material/create')
              ->type('nombre', $material->nombre)
              ->select('vehiculo_id', $material->vehiculo_id)
              ->select('rubro', $material->rubro)
              ->type('detalle', $material->detalle)
              ->press('Registrar')
              ->assertSee($material->nombre);
    });
  }

  public function testUpdate()
  {
    $this->browse(function (Browser $browser) {
      $material = factory(Material::class)->create();
      $material_edit = factory(Material::class)->make();
      $browser->loginAs(User::find(1))
              ->visit('/material')
              ->click('.glyphicon-edit')
              ->clear('nombre')
              ->type('nombre', $material_edit->nombre)
              ->select('vehiculo_id', $material_edit->vehiculo_id)
              ->select('rubro', $material_edit->rubro)
              ->clear('detalle')
              ->type('detalle', $material_edit->detalle)
              ->press('Editar')
              ->visit('/material')
              ->assertSee($material_edit->nombre);
    });
  }

  public function testDelete()
  {
    $this->browse(function (Browser $browser) {
      $material = factory(Material::class)->create();
      $browser->loginAs(User::find(1))
              ->visit('/material')
              ->click('.glyphicon-trash')
              ->visit('/material')
              ->assertDontSee($material->nombre);
    });
  }
}
