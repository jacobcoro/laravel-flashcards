<div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-4 w-96">
    @auth
    <div class="flex justify-between">
        <button wire:click="toggleEditing" class=" bg-slate-500 hover:bg-slate-70 font-bold py-1 px-4 rounded">
            Edit
        </button>
        <button class=" bg-slate-400 rounded px-1 font-black" wire:click="deleteFlashcard">X</button>
    </div>

    @endauth



    @if ($isEditing)

    <form wire:submit.prevent="updateFlashcard" class="py-8 flex flex-col">
        <input type="text" wire:model="newQuestion" placeholder="Question" class="rounded bg-slate-200 mb-2">
        <hr class="border-t-2 border-gray-200 dark:border-gray-700 pb-2">

        <input type="text" wire:model="newAnswer" placeholder="Answer" class="rounded bg-slate-200">
        <button class="text-white font-bold py-2 px-4 rounded bg-blue-500 hover:bg-blue-700"
            type="submit">Submit</button>
    </form>

    @if($showAnswer)
    <hr class="border-t-2 border-gray-200 dark:border-gray-700">
    <input class="text-lg font-semibold text-gray-800 dark:text-gray-200" wire:model='$answer'>
    @endif
    @else
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
    @endif
</div>