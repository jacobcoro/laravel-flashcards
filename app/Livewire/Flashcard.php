<?php

namespace App\Livewire;

use App\Http\Controllers\FlashcardController;
use Livewire\Component;
use Log;

use function PHPUnit\Framework\isEmpty;

class Flashcard extends Component
{
  public int $id = 0;
  public string $question = '';
  public string $answer = '';

  public $showAnswer = false;

  public function mount($flashcard)
  {
    $this->id = $flashcard['id'];
    $this->question = $flashcard['question'];
    $this->answer = $flashcard['answer'];
  }

  public function handleAnswer(bool $remembered)
  {
    $this->showAnswer = false;
    $this->dispatch('flashcardAnswered', $remembered, $this->id);
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
