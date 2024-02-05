<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Reactive;

class Flashcard extends Component
{
  public $flashcard;
  public $question;
  public $answer;
  public $id;

  public $showAnswer = false;

  public function mount($flashcard)
  {
    $this->question =  $flashcard->question;
    $this->answer =  $flashcard->answer;
    $this->id =   $flashcard->id;
  }

  public function handleAnswer(bool $remembered)
  {
    $this->showAnswer = false;
    $this->dispatch('flashcardAnswered', $remembered, $this->id);
  }

  public function deleteFlashcard()
  {
    $controller = new FlashcardController();
  }

  public function render()
  {
    return view('livewire.flashcard');
  }
};
