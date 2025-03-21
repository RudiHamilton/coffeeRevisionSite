<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SingleFlashcard extends Model
{
    /** @use HasFactory<\Database\Factories\SingleFlashcardFactory> */
    use HasFactory;

    protected $primaryKey = 'single_flashcard_id';

    protected $fillable = [
        'group_flashcard_id',
        'name',
        'question',
        'answer',
    ];
    public function groupFlashcard()
    {
        return $this->belongsTo(GroupFlashcard::class, 'group_flashcard_id', 'group_flashcard_id');
    }
}
