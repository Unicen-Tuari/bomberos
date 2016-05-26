<?php

use Illuminate\Database\Seeder;

class NotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
       for($i = 1; $i < 5; $i++){
               App\Note::create(array(
                   'note' => 'nota' . $i
               ));
          }
     }
}
