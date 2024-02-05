<?php

namespace App\Livewire;

use App\Http\Controllers\FlashcardController;
use Livewire\Component;
use App\Models\Flashcard;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;

class FlashcardApp extends Component
{
    public $defaultFlashcards  = [
        [
            'id' => 1,
            'question' => "What's the difference between `fn` and `function` in PHP lambdas?", 'answer' => "`fn` can only be one line and cannot use brackets or `return`. `function` must use brackets and the `return` keyword"
        ],
        [
            'id' => 2,
            'question' => 'What is 2 + 2?',
            'answer' => '4',
        ],
        [
            'id' => 3,
            'question' => 'What is 3 + 3?',
            'answer' => '6',
        ],
        [
            'id' => 4,
            'question' => 'What is 4 + 4?',
            'answer' => '8',
        ],
    ];


    /**
     * @var public Illuminate\Support\Collection $flashcards;
     */
    public Collection $flashcards;

    public bool $loggedIn = false;

    #[On('flashcard-created')]
    public function flashcardCreated(): void
    {
        $this->refreshFlashcards();
    }

    public function refreshFlashcards(): void
    {
        $controller =  new FlashcardController();
        $this->flashcards = $controller->index(auth()->id());
    }

    // fetch all flashcards on mount
    public function mount(): void
    {
        $this->loggedIn = auth()->id() !== null;
        if ($this->loggedIn) {
            $this->refreshFlashcards();
        } else {
            $this->flashcards = collect($this->defaultFlashcards);
        }
    }

    public function render()
    {
        return view('livewire.flashcard-app');
    }
}
