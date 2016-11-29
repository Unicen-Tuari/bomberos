<?php

use Illuminate\Database\Seeder;
use App\Vehiculo;

class VehiculoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehiculo::create(['patente' => 'ABU 167','num_movil' => '1']);
        Vehiculo::create(['patente' => 'AE 439 VG','num_movil' => '2']);
        Vehiculo::create(['patente' => 'KOP 048','num_movil' => '3']);
        Vehiculo::create(['patente' => 'NM 337 OI','num_movil' => '4']);
        Vehiculo::create(['patente' => 'UOW 898','num_movil' => '5']);
        Vehiculo::create(['patente' => 'LIE 126','num_movil' => '6']);
        Vehiculo::create(['patente' => 'LR 784 TT','num_movil' => '7']);
        Vehiculo::create(['patente' => 'AWR 941','num_movil' => '8']);
        Vehiculo::create(['patente' => 'BBN 543','num_movil' => '9']);
        Vehiculo::create(['patente' => 'BT 045 PE','num_movil' => '10']);
        Vehiculo::create(['patente' => 'WR 989 PO','num_movil' => '11']);
    }
}
