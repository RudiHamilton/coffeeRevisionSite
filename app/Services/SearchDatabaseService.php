<?php

namespace App\Services;

//This is a service for searching the database for flashcards.
//ALTHOUGH This will be used in the future for implementing quizzes and will allow the user to search both

use App\Models\GroupFlashcard;

class SearchDatabaseService{
    public function search($query){
        $params = [
            ['name','ILIKE',"%{$query}%"],
            ['visibility','=','true'],
        ];
        $groupFlashcards = GroupFlashcard::where($params)
            ->orderBy('created_at','asc')
            ->get();
        return $groupFlashcards;
    }
}