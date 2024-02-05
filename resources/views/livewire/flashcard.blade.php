<div class="relative bg-white dark:bg-gray-800 shadow-lg rounded-lg p-4 w-96">
    @auth
    <button class="absolute top-2 right-2 bg-slate-400 rounded px-1 font-black" wire:click="deleteFlashcard">X</button>
    @endauth

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