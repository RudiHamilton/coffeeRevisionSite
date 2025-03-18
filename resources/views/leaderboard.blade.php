<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Leaderboard') }}
        </h2>
    </x-slot>
    <div class="card-body">
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
    </div>
</x-app-layout>