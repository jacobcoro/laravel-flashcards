<form wire:submit.prevent="createFlashcard" class="py-8 space-x-1">
    <input type="text" wire:model="newQuestion" placeholder="Question" class="rounded bg-slate-200">
    <input type="text" wire:model="newAnswer" placeholder="Answer" class="rounded bg-slate-200">
    <button class="text-white font-bold py-2 px-4 rounded bg-blue-500 hover:bg-blue-700" type="submit">Create
        Flashcard</button>
</form>