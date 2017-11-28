<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Vehiculo;
use App\Material;
class MaterialsTest extends DuskTestCase
{
    public function testMaterialsCreate()
    {
       $this->browse(function (Browser $browser) {
         $vehiculo = factory(Vehiculo::class)->create();
         $browser->loginAs(User::find(1))
                 ->visit('/material/create')
                 ->type('nombre', 'manguera')
                 ->select('vehiculo_id', $vehiculo->id)
                 ->select('rubro', 'INCENDIO')
                 ->type('detalle', 'Este test verifica el alta de un material')
                 ->press('Registrar')
                 ->assertSee('manguera');
      });
   }

    public function testMaterialsUpdate()
    {
      $this->browse(function (Browser $browser) {
        $material = factory(Material::class)->create();
        $browser->loginAs(User::find(1))
                ->visit('/material')
                ->click('.glyphicon-edit')
                ->clear('nombre')
                ->type('nombre', 'mangueraModificada')
                ->clear('detalle')
                ->type('detalle', 'Este test verifica la modificacion de un material')
                ->press('Editar')
                ->assertSee('mangueraModificada');
     });
   }

    public function testMaterialsDelete()
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
