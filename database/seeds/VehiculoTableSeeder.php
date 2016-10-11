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
        Vehiculo::create(['patente' => 'ABU 167']);
        Vehiculo::create(['patente' => 'AE 439 VG']);
        Vehiculo::create(['patente' => 'KOP 048']);
        Vehiculo::create(['patente' => 'NM 337 OI']);
        Vehiculo::create(['patente' => 'UOW 898']);
        Vehiculo::create(['patente' => 'LIE 126']);
        Vehiculo::create(['patente' => 'LR 784 TT']);
        Vehiculo::create(['patente' => 'AWR 941']);
        Vehiculo::create(['patente' => 'BBN 543']);
        Vehiculo::create(['patente' => 'BT 045 PE']);
        Vehiculo::create(['patente' => 'WR 989 PO']);
    }
}
