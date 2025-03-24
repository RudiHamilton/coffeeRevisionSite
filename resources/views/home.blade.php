<x-app-layout>
    <link href="{{asset('css/layout.css')}}" rel="stylesheet" />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>
    <div class="card-body">
        <h1>Study with passion. You can brew it!</h1>
        <div class="card-text">
            <p>Join us today and compete against colleagues, classmates and friends to see who can become the best at learning. Its no easy feat, but with BrainBrew we'd love to help!</p>
        </div>
        <div class="register-button">
            <a href="{{route('register')}}" class="btn btn-dark">Sign up for free</a>
        </div>
    </div>
    <div class="study-items">
            <div class="card">
                <a href="{{route('leaderboard.index')}}">
                    <h4 class="h4">Leaderboard</h4>
                    <img src="" alt="">
                </a>
            </div>
        <a href="">
            <div class="card">
                <a href="{{route('pomodoro.index')}}">
                    <h4 class="h4">Pomodoro</h4>
                    <img class="img" src="{{asset('images/pomodoro3.png')}}" alt="">
                </a>
            </div>
        </a>
        <a href="">
        <div class="card">
            <a href="{{route('revisiontimeline.index')}}">
                <h4 class="h4">Revision Timeline</h4>
                <img class="img" src="{{asset('images/RevisionTimetable.png')}}" alt="">
            </a>
        </div>
        </a>
        <a href="">
            <div class="card">
                <a href="{{route('flashcards.index')}}">
                    <h4 class="h4">Flashcards</h4>
                    <img class="img" src="{{asset('images/Flashcards.png')}}" alt="">
                </a>
            </div>
        </a>
    </div>

</x-app-layout>