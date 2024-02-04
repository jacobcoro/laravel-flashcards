<?php

use Livewire\Volt\Component;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;

new class extends Component {
    public $question;
    public $answer;
    public $id;

    public $showAnswer = false;

    public function mount(string $question, string $answer, int $id)
    {
        $this->question = $question;
        $this->answer = $answer;
        $this->id = $id;
    }

    public function handleAnswer(bool $remembered)
    {
        $this-> showAnswer = false;
        $this->dispatch('flashcardAnswered', $remembered, $this->id);
        Log::info( $remembered ? 'Remembered' : 'Not Remembered');
    }

    #[On('flashcardAnswered')]
    public function flashcardAnswered($remembered, $theId)
    {
        // print result
        if($remembered){
           Log::info("You remembered the flashcard with id: {$theId}");
        } else {
           Log::info("You didn't remember the flashcard with id: {$theId}");
        }

    } 

}; ?>

<div>
    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-4 w-96">
        <div class="flex flex-col my-6 space-y-4">
            <div class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $question }}</div>
            @if($showAnswer)
            <hr class="border-t-2 border-gray-200 dark:border-gray-700">
            <div class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $answer }}</div>
            @endif
        </div>
        <div class="flex justify-center items-center pt-4">
            @if($showAnswer)
            <div class="flex justify-between flex-1"> <button wire:click="handleAnswer(false)"
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Didn't Remember
                </button>
                <button wire:click="handleAnswer(true)"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Remembered
                </button>
            </div>

            @else
            <button wire:click="$set('showAnswer', true)"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Show Answer
            </button>
            @endif
        </div>

    </div>