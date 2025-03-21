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
        if(!empty($userFlashcardId)){
            $groupFlashcards = GroupFlashcard::whereHas('userFlashcard', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })->get();
        }elseif(empty($userFlashcardId)){
            UserFlashcard::create([
                'user_id'=> $userId,
            ]);

            $groupFlashcards = GroupFlashcard::whereHas('userFlashcard', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })->get();
        }
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
        $singleFlashcards =  SingleFlashcard::whereHas('groupFlashcard', function ($query) use ($groupFlashcardId) {
            $query->where('group_flashcard_id', $groupFlashcardId);
        })->get();
        $groupFlashcardName = GroupFlashcard::find($groupFlashcardId)->name;
        $findingGroupFlashcardId = GroupFlashcard::find($groupFlashcardId)->group_flashcard_id;
        return view('flashcards.showflashcards',compact('singleFlashcards','groupFlashcardName','findingGroupFlashcardId'))->with('success','Created Successfully');    
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

