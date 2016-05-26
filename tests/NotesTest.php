<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Note;

class NotesTest extends TestCase
{

    public function test_notes_list()
    {
        Note::create(['note' => 'My first note']);
        Note::create(['note' => 'Second note']);

        $this->visit('notes')
          ->see('My first note')
          ->see('Second note');
    }
}
