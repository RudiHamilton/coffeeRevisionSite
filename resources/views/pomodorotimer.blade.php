<x-app-layout>
    <link href="{{ asset('css/coffeecup.css') }}" rel="stylesheet">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(key: 'Pomodoro Timer') }}
        </h2>
    </x-slot>
    <div class="card-body">
        <div class="container">
                <h1>Coffee Cup Pomodoro Timer</h1>
                <h2>Welcome to the focus timer. This coffee cup will empty in 25 minutes! After that you're free to do whatever for 5 minutes!</h2>
                <br>
                <div class="inputs">
                    <button class="btn" id="startbtn">Start</button>
                    <button class="btn btn-danger" id="pausebtn">Pause</button>
                </div>
                <br><br><br><br><br><br>
            <div class="cup" id="coffee-cup">
                <div class="span steam"></div>
                <div class="span steam"></div>
                <div class="span steam"></div>
                <div class="cup-handle"></div>
            </div>
            <div class="base-timer-div" style="font-size:50px;">
                <p id="basetimer">25:00</p>
            </div>
        </div>
        @vite('resources/js/coffeecup.js')
    </div>
</x-app-layout>