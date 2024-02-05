<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFlashcardRequest;
use App\Http\Requests\UpdateFlashcardRequest;
use App\Models\Flashcard;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class FlashcardController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param int $userId
     * @return array<int, Flashcard>
     */
    public function index(int|null $userId)
    {
        if ($userId === null) {
            return collect(null);
        }
        return collect(Flashcard::where('user_id', $userId)->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(int $userId, string $question, string $answer): void
    {
        Flashcard::create([
            'user_id' => $userId,
            'question' => $question,
            'answer' => $answer
        ]);
    }

    public function update(): void
    {
        //
    }

    public function destroy(): void
    {
        //
    }
}
