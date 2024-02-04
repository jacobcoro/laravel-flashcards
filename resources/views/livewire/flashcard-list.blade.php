<div class="flex flex-col space-y-4">
    @foreach ($flashcards as $flashcard)
    <livewire:flashcard :question="$flashcard['question']" :answer="$flashcard['answer']" :id="$flashcard['id']"
        :key="$flashcard['id']" />

    @endforeach
</div>