<div class="flex flex-col space-y-4 items-center">
    @foreach ($flashcards as $flashcard)
    <livewire:flashcard :flashcard="$flashcard" :key="$flashcard['id']" />

    @endforeach
</div>