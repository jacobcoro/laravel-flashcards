<div>
    <h1>Flashcard App</h1>
    <h3>create flashcard</h3>
    <form wire:submit.prevent="createFlashcard">
        <input type="text" wire:model="newQuestion" placeholder="Question">
        <input type="text" wire:model="newAnswer" placeholder="Answer">
        <button>Create</button>
    </form>
    <livewire:flashcard-list :flashcards="$flashcards" />
</div>