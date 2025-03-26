<?php

namespace App\Services;

//This is a service for searching the database for flashcards.
//ALTHOUGH This will be used in the future for implementing quizzes and will allow the user to search both

use App\Models\GroupFlashcard;


class SearchDatabaseService{
    public function search($searchText){
        $flashcardsByName = GroupFlashcard::where('name', 'ILIKE', "%{$searchText}%")
            ->where('visibility', true)
            ->with('category')
            ->orderBy('created_at', 'asc')
            ->get();

        $flashcardsByCategory = GroupFlashcard::whereHas('category', function ($query) use ($searchText) {
                $query->where('category', 'ILIKE', "%{$searchText}%");
            })
            ->where('visibility', true)
            ->with('category')
            ->orderBy('created_at', 'asc')
            ->get();

        $allFlashcards = $flashcardsByName->merge($flashcardsByCategory)->unique('group_flashcard_id');
        return $allFlashcards;
    }
}
