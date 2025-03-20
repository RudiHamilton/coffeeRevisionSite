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
     
        $revisionTimeline = RevisionTimeline::where('user_id', $userId)->pluck('revision_timeline_id')->toArray();
        $revisionTimeline = array_pop($revisionTimeline);

        if(!empty($revisionTimeline)){
            $revisionTasks = RevisionTask::where('revision_timeline_id',$revisionTimeline)->get('revision_task_id')->toArray();
            $collectRevisionTasks = RevisionTask::whereIn('revision_task_id',$revisionTasks)->get();
            
            foreach ($collectRevisionTasks as $task) {
                $events[] = [
                    'title' => $task->name,
                    'desc' => $task->description,
                    'start' => $task->start_time,
                    'end' => $task->finish_time,
                ];
            }
            return view('revisiontimeline.index',compact('events'));
        }
        elseif(empty($revisionTimeline)){
            return view('revisiontimeline.index',data: compact('events'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('revisiontimeline.create');        
    } 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId= Auth::id();
        $user=Auth::user();
        $revisionTimeline = RevisionTimeline::where('user_id', $userId)->pluck('revision_timeline_id')->toArray();
        $revisionTimeline = array_pop($revisionTimeline);
        if(!empty($revisionTimeline)){
            RevisionTask::create([
                'revision_timeline_id' => $revisionTimeline,
                'name'=> $request->name,
                'description'=> $request->description,
                'start_time'=>$request->start_time,
                'finish_time'=>$request->finish_time,
                'completed'=>'f',
            ]);
            return redirect('revisiontimeline')->with('success','Task added successfully');
        }elseif(empty($revisionTimeline)){
            RevisionTimeline::create([
                'user_id'=>$userId,
                'name'=>$user->first_name,
            ]);
            $revisionTimeline = RevisionTimeline::where('user_id', $userId)->pluck('revision_timeline_id')->toArray();
            $revisionTimeline = array_pop($revisionTimeline);
            RevisionTask::create([
                'revision_timeline_id' => $revisionTimeline,
                'name'=> $request->name,
                'description'=> $request->description,
                'start_time'=>$request->start_time,
                'finish_time'=>$request->finish_time,
                'completed'=>'f',
            ]);
            
            return redirect('revisiontimeline')->with('success','Task added successfully');
        }
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
