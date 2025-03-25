<?php

namespace App\Http\Controllers;

use App\Services\SearchDatabaseService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    

    public function __construct(private SearchDatabaseService $searchDatabaseService){
    }
    public function search(Request $request){
        $query = $request->search;

        $groupFlashcards = $this->searchDatabaseService->search($query);

        return view('search',compact('groupFlashcards'));
    }
}
