<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;

class FlashcardList extends Component
{
    public $flashcards  = [
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
