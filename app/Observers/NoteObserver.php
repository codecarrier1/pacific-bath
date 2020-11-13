<?php

namespace App\Observers;

use App\Note;

class NoteObserver
{
    public function created(Note $note)
    {
        // create a new note in Lead Perfection
        // store the unique note ID on the table
    }

    public function updated(Note $note)
    {
        // update an existing note in Lead Perfection
    }
}
