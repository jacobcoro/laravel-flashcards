<form wire:submit.prevent="createFlashcard">
    <input type="text" wire:model="newQuestion" placeholder="Question">
    <input type="text" wire:model="newAnswer" placeholder="Answer">
    <button class="text-white font-bold py-2 px-4 rounded bg-blue-500 hover:bg-blue-700" type="submit">Create
        Flashcard</button>
</form>