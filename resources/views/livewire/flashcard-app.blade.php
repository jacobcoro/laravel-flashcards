<div>
    @auth
    <livewire:create-flashcard-form />
    @endauth

    @guest
    <p class="text-red-500"> Log in to create flashcards. </p>
    @endguest

    <livewire:flashcard-list :flashcards="$flashcards" />
</div>