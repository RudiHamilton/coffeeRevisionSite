<x-app-layout>
    <link rel="stylesheet" href="{{asset('css/leaderboard.css')}}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Leaderboard') }}
        </h2>
    </x-slot>
    <div class="card-body">
        <p> welcome to the leaderboard. here is where you will compete against friends.</p><br>
        <table class="table table-striped">
            <thead>
                <tr>
                
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
      
    </div>
    
</x-app-layout>