<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupFlashcard extends Model
{
    /** @use HasFactory<\Database\Factories\GroupFlashcardFactory> */
    use HasFactory;
    protected $primaryKey = 'group_flashcard_id';
    protected $fillable = [
        'user_flashcard_id',
        'name',
        'description',
        'visibility',
    ];
    public function singleFlashcard(){
        return $this->hasMany(SingleFlashcard::class,'single_flashcard_id','single_flashcard_id');
    }
    public function userFlashcard()
    {
        return $this->belongsTo(UserFlashcard::class, 'user_flashcard_id', 'user_flashcard_id');
    }
}
