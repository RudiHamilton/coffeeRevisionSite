<x-app-layout>
    <link rel="stylesheet" href="{{asset('leaderboard.css')}}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Leaderboard') }}
        </h2>
    </x-slot>
    <div class="card-body">
        <p> welcome to the leaderboard. here is where you will compete against friends.
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>MMR</th>
                    <th>Rank</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->username}}</td>
                    <td>{{$user->mmr ? $user->mmr->mmr_number:'N/A'}}</td>
                    <td>{{$user->mmr && $user->mmr->rank ? $user->mmr->rank->rank:'unranked'}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="stage">
            <div class="stage-front">
                Leaderboard
            </div>
            <div class="tower third">
                <div class="face front"></div>
                <div class="face right"></div>
                <div class="face top">
                    <div class="player">Player 3</div>
                </div>
            </div>
            <div class="tower first">
                <div class="face front"></div>
                <div class="face top">
                    <div class="player">Player 1</div>
                </div>
            </div>
            <div class="tower second">
                <div class="face front"></div>
                <div class="face left"></div>
                <div class="face top">
                    <div class="player">Player 2</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>