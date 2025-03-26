<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CatergoryFactory> */
    use HasFactory;
    protected $primaryKey = 'catergory_id';
    protected $fillable = [
        'catergory'
    ];

    public function groupFlashcards(){
        return $this->hasMany(GroupFlashcard::class,'category_id');
    }
}
