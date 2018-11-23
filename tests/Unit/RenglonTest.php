<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Planilla;
use App\Renglon;

class RenglonTest extends TestCase
{
   public function testPlanillas()
  {
    $planilla = factory(Planilla::class)->create();
    $renglon = factory(Renglon::class)->create(['planilla_id'=>$planilla->id]);
    $this->assertEquals($renglon->planilla_id,$planilla->id);
  }
}
