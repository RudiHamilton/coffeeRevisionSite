<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFlashcard extends Model
{
    /** @use HasFactory<\Database\Factories\UserFlashcardFactory> */
    use HasFactory;

    protected $primaryKey = 'user_flashcard_id';

    protected $fillable = [
        'user_id',
    ];
    public function groupFlashcards()
    {
        return $this->hasMany(GroupFlashcard::class, 'user_flashcard_id', 'user_flashcard_id');
    }
}
