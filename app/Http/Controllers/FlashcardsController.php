<?php

namespace App\Http\Controllers;

use App\Models\GroupFlashcard;
use App\Models\SingleFlashcard;
use App\Models\UserFlashcard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FlashcardsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $userFlashcardId = UserFlashcard::where("user_id",$userId)->value('user_flashcard_id');

        if(empty($userFlashcardId)){
            UserFlashcard::create([
                'user_id'=> $userId,
            ]);
        }

        $groupFlashcards = GroupFlashcard::whereHas('userFlashcard', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();
        
        return view('flashcards.viewgroupflashcards', compact('groupFlashcards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createflashcardgroup()
    {
        return view('flashcards.createflashcardgroup');
    }
    public function createflashcardsingle($groupFlashcardId)
    {   
        return view('flashcards.createflashcardsingle',compact('groupFlashcardId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeGroup(Request $request)
    {
        $userId = Auth::id();
        $userFlashcardId = UserFlashcard::where('user_id',$userId)->value('user_flashcard_id');
        
        $request = [
        'user_flashcard_id'=>$userFlashcardId,
        'name'=> $request->name,
        'description'=> $request->description,
        ];
        GroupFlashcard::create($request);

        return redirect()->route('flashcards.index')->with('success','Created Successfully');    
    }    
    public function storeSingle($groupFlashcardId,Request $request)
    {
        $request = [
        'group_flashcard_id'=>$groupFlashcardId,
        'name'=> $request->name,
        'question'=> $request->question,
        'answer'=> $request->answer,
        ];
        SingleFlashcard::create($request);

        //$flashcard = SingleFlashcard::find($single_flashcard_id);
        return redirect()->to('flashcards/show/'.$groupFlashcardId)->with('status','Permission deleted successfully');
    }    
    /**
     * Display the specified resource.
     */
    public function show($group_flashcard_id)
    {
        $singleFlashcards =  SingleFlashcard::whereHas('groupFlashcard', function ($query) use ($group_flashcard_id) {
            $query->where('group_flashcard_id', $group_flashcard_id);
        })->get();
        $groupFlashcardName = GroupFlashcard::find($group_flashcard_id)->name;
        $findingGroupFlashcardId = GroupFlashcard::find($group_flashcard_id)->group_flashcard_id;

        
        return view('flashcards.showflashcards',compact('singleFlashcards','groupFlashcardName','findingGroupFlashcardId'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editGroup(string $id)
    {
        //
    }
    public function editSingle(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateGroup(Request $request, string $id)
    {
        //
    }
    public function updateSingle(Request $requestm,string $id){

    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroyGroup($single_flashcard_id)
    {

    }
    public function destroySingle($single_flashcard_id)
    {
        $flashcard = SingleFlashcard::find($single_flashcard_id);
        $groupFlashcardId = SingleFLashcard::where('single_flashcard_id',$single_flashcard_id)->value('group_flashcard_id');
        $flashcard->delete();
        return redirect()->to('flashcards/show/'.$groupFlashcardId)->with('status','Permission deleted successfully');
    }
}

