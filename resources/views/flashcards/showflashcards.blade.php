<x-app-layout>
    <head>
        <link href="{{ asset('css/singleflashcard.css') }}" rel="stylesheet">
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            You are viewing the flashcard group: {{ __($groupFlashcardName) }}
            <a  style="margin-left: 10px;"class="btn btn-dark float-end"  href="{{ route('createflashcardsingle',$findingGroupFlashcardId)}}">Create Single Flashcard +</a>
            <a  style="margin-left:5px"class="btn btn-dark float-end" href="{{route('flashcards.index')}}">Back</a>
        </h2>
        
    </x-slot>
    <div class="card-body mt-5">

        @forelse ($singleFlashcards as $singleFlashcard)
            <div class="container">
                <x-single-flashcards>
                    <div class="front">
                        <h4 class="h4 m-2">{{$singleFlashcard->name}}</h4><p class="m-2">
                        Question: <br>{{$singleFlashcard->question}} 
                    </div>
                    <div class="back">
                        Answer: {{$singleFlashcard->answer}} </p>
                    </div>
                </x-single-flashcards>
            </div>
        @empty
            <h1 class="m-3">You have no flashcards for this group. Why dont you try creating some!</h1><br><br><br>
        @endforelse  
    </div>
</x-app-layout>