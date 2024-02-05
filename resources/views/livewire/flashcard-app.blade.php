<div>
    <form wire:submit.prevent="createFlashcard">
        <input type="text" wire:model="newQuestion" placeholder="Question">
        <input type="text" wire:model="newAnswer" placeholder="Answer">
        <button
            class="text-white font-bold py-2 px-4 rounded {{ $loggedIn?'bg-blue-500 hover:bg-blue-700':'bg-gray-500 hover:bg-gray-700' }}"
            type="submit" :disabled="{{!$loggedIn}}">Create
            Flashcard</button>
    </form>
    <livewire:flashcard-list :flashcards="$flashcards" />
</div>