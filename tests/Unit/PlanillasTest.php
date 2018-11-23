<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Planilla;
use App\Renglon;

class PlanillasTest extends TestCase
{
   public function testRenglones()
  {
    $planilla = factory(Planilla::class)->create();
    $renglon1 = factory(Renglon::class)->create(['planilla_id'=>$planilla->id]);
    $renglon2= factory(Renglon::class)->create(['planilla_id'=>$planilla->id]);
    $this->assertEquals($renglon1->planilla_id,$planilla->id);
    $this->assertEquals($planilla->renglones()->count(), 2);
  }
}