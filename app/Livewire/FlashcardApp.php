<?php

namespace App\Livewire;

use App\Http\Controllers\FlashcardController;
use Livewire\Component;
use App\Models\Flashcard;
use Illuminate\Support\Collection;

class FlashcardApp extends Component
{
    public string $newQuestion = '';
    public string $newAnswer = '';

    /**
     * @var public Illuminate\Support\Collection $flashcards;

     */
    public Collection $flashcards;

    protected FlashcardController $flashcard;

    public function __construct()
    {
        $this->flashcard = new FlashcardController();
    }

    public function createFlashcard(): void
    {
        $this->flashcard->store(auth()->id(), $this->newQuestion, $this->newAnswer);
        $this->getAllFlashcards();
    }

    public function getAllFlashcards(): void
    {
        $this->flashcards = $this->flashcard->index(auth()->id());
    }

    // fetch all flashcards on mount
    public function mount(): void
    {
        $this->getAllFlashcards();
    }

    public function render()
    {
        return view('livewire.flashcard-app', ['flashcards' => $flashcards ?? []]);
    }
}
