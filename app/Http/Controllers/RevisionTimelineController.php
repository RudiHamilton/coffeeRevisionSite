<?php

namespace App\Http\Controllers;

use App\Models\RevisionTask;
use App\Models\RevisionTimeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RevisionTimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = [];

        $userId= Auth::id();
        $revisionTimeline = RevisionTimeline::where('user_id', $userId)->pluck('revision_timeline_id');

        $revisionTasks = RevisionTask::where('revision_timeline_id',$revisionTimeline)->pluck('revision_task_id');
        $collectRevisionTasks = RevisionTask::where('revision_task_id',$revisionTasks)->get();
        return view('revisiontimeline',compact($revisionTasks));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
