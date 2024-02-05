<?php

namespace App\Livewire;

use App\Http\Controllers\FlashcardController;
use Livewire\Component;

class Flashcard extends Component
{
  public $flashcard;
  public string $question = '';
  public string $answer = '';

  public $showAnswer = false;

  public function mount($flashcard)
  {
    $this->question = $flashcard->question;
    $this->answer = $flashcard->answer;
  }

  public function handleAnswer(bool $remembered)
  {
    $this->showAnswer = false;
    $this->dispatch('flashcardAnswered', $remembered, $this->flashcard->id);
  }

  public function deleteFlashcard()
  {
    $controller = new FlashcardController();
    $controller->destroy($this->flashcard->id);
    $this->dispatch('refresh-flashcards');
  }

  public function render()
  {
    return view('livewire.flashcard');
  }
};
