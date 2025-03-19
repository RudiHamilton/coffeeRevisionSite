<?php

namespace App\Http\Controllers;

use App\Models\MMR;
use App\Models\Rank;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LeaderboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $userId = Auth::id();
        // $user = User::where('user_id',$userId)->first();

        // // $d = User::select('users.*')
        // //     ->join('m_m_r_s','m_m_r_s.user_id','=', 'user_id')
        // //     ->join('ranks','rank.mmr_id','=','mmr_id');
        // // dd($d);
            
        // $users = User::with(['mmr.rank'])->get()->sortByDesc(fn($user)=>$user->mmr->mmr_number ?? 0);
        // return view('leaderboard',compact('users'));

        $userId = Auth::id();

        $userMmr = Mmr::where('user_id', $userId)->first();

        if (!$userMmr) {
            return redirect()->back()->with('error', 'You have no MMR record.');
        }

        // gets users rank range
        $userRank = Rank::where('rank_range_start', '<=', $userMmr->mmr_number)
                        ->where('rank_range_end', '>=', $userMmr->mmr_number)
                        ->first();

        //if user rank null returns this.
        if (!$userRank) {

            
            return redirect()->back()->with('error', 'No rank found for your MMR .');
        }

        // Get users in the same rank range, ordered by MMR descending
        $users = User::with(['mmr.rank'])
            ->whereHas('mmr', function ($query) use ($userRank) {
                $query->whereBetween('mmr_number', [$userRank->rank_range_start, $userRank->rank_range_end]);
            })
            ->join('m_m_r_s', 'm_m_r_s.user_id', '=', 'users.user_id')
            ->orderByDesc('m_m_r_s.mmr_number')
            ->select('users.*', 'm_m_r_s.mmr_number') // Select necessary fields
            ->get();

        return view('leaderboard', compact('users', 'userRank'));
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
