<?php

namespace App\Livewire;

use App\Http\Controllers\FlashcardController;
use Livewire\Component;

class CreateFlashcardForm extends Component
{
    public string $newQuestion = '';
    public string $newAnswer = '';
    public function createFlashcard(): void
    {
        $controller =  new FlashcardController();
        $controller->store(auth()->id(), $this->newQuestion, $this->newAnswer);
        $this->dispatch('flashcard-created');
    }
    public function render()
    {
        return view('livewire.create-flashcard-form');
    }
}
