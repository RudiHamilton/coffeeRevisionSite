<?php

namespace App\Http\Controllers;

use App\Models\UserFlashcard;
use App\Services\SearchDatabaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    

    public function __construct(private SearchDatabaseService $searchDatabaseService){
    }
    public function search(Request $request){
        $query = $request->search;

        $groupFlashcards = $this->searchDatabaseService->search($query);

        $userId = Auth::id();

        $findingActiveUserFlashcardId = UserFlashcard::where('user_id', $userId)->value('user_flashcard_id');

        return view('search',compact('groupFlashcards','findingActiveUserFlashcardId'));
    }
}
