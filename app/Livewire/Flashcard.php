<?php

namespace App\Livewire;

use App\Http\Controllers\FlashcardController;
use Livewire\Component;

class Flashcard extends Component
{
  public int $id = 0;
  public string $question = '';
  public string $answer = '';

  public bool $isEditing = false;

  public bool $showAnswer = false;

  public function mount(array $flashcard): void
  {
    $this->id = $flashcard['id'];
    $this->question = $flashcard['question'];
    $this->answer = $flashcard['answer'];
  }

  public function handleAnswer(bool $remembered): void
  {
    $this->showAnswer = false;
    $this->dispatch('flashcardAnswered', $remembered, $this->id);
  }

  public function deleteFlashcard()
  {
    $controller = new FlashcardController();
    $controller->destroy($this->id);
    $this->dispatch('refresh-flashcards');
  }

  public function render()
  {
    return view('livewire.flashcard');
  }
};
