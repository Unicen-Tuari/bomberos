<?php

use Illuminate\Database\Seeder;
use App\Bombero;

class BomberoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Bombero::class)->times(25)->create();
    }
}
