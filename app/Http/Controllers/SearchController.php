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
        $searchText = $request->search;

        $groupFlashcards = $this->searchDatabaseService->search($searchText);

        $userId = Auth::id();

        $findingActiveUserFlashcardId = UserFlashcard::where('user_id', $userId)->value('user_flashcard_id');

        return view('search',compact('groupFlashcards','findingActiveUserFlashcardId'));
    }
}
