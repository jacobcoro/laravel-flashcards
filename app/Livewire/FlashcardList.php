<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Reactive;

class FlashcardList extends Component
{
    #[Reactive]
    public $flashcards;

    public function mount($flashcards)
    {
        $this->flashcards = $flashcards;
    }

    #[On('flashcardAnswered')]
    public function flashcardAnswered(bool $remembered, int $id)
    {
        // print result
        if ($remembered) {
            Log::info("You remembered the flashcard with id: {$id}");
        } else {
            Log::info("You didn't remember the flashcard with id: {$id}");
        }
    }

    public function render()
    {
        return view('livewire.flashcard-list');
    }
}
