<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Illuminate\Database\Eloquent\Builder|Flashcard where(string $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Flashcard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Flashcard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Flashcard query()
 * @method static \Illuminate\Database\Eloquent\Builder|Flashcard whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flashcard create(array $attributes = [])
 */
class Flashcard extends Model
{
    use HasFactory;
    public $fillable = ['user_id', 'question', 'answer'];
}
