<?php

namespace App\Livewire;

use App\Http\Controllers\FlashcardController;
use App\Models\Flashcard as ModelsFlashcard;
use Livewire\Component;

class Flashcard extends Component
{
  public int $id = 0;
  public string $question = '';
  public string $answer = '';
  public string $newQuestion = '';
  public string $newAnswer = '';

  public bool $isEditing = false;

  public bool $showAnswer = false;

  public function mount(array|ModelsFlashcard $flashcard): void
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

  public function toggleEditing(): void
  {
    $this->isEditing = !$this->isEditing;
    if ($this->isEditing) {
      $this->newQuestion = $this->question;
      $this->newAnswer = $this->answer;
    } else {
      $this->newQuestion = '';
      $this->newAnswer = '';
    }
  }

  public function deleteFlashcard()
  {
    $controller = new FlashcardController();
    $controller->destroy($this->id);
    $this->dispatch('refresh-flashcards');
  }

  public function updateFlashcard()
  {
    $controller = new FlashcardController();
    $controller->update($this->id, $this->newQuestion, $this->newAnswer);
    $this->dispatch('refresh-flashcards');
    $this->isEditing = false;
  }

  public function render()
  {
    return view('livewire.flashcard');
  }
};
