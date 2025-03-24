<x-app-layout>
    <head>
        <link href="{{ asset('css/singleflashcard.css') }}" rel="stylesheet">
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            You are viewing the flashcard group: {{ __($groupFlashcardName) }}
            <a  style="margin-left: 10px;"class="btn float-end"  href="{{ route('createflashcardsingle',$findingGroupFlashcardId)}}">Create Single Flashcard +</a>
            <a  style="margin-left:5px"class="btn float-end" href="{{route('flashcards.index')}}">Back</a>
        </h2>
        
    </x-slot>
    <div class="card-body mt-5">
        <div class="flashcard-container">
            @forelse ($singleFlashcards as $singleFlashcard)
                <div class="container">
                    <x-single-flashcards>
                        <div class="front">
                            <h4 class="h4 m-2">{{$singleFlashcard->name}}</h4>
                            <p class="m-2">
                            Question: <br>{{$singleFlashcard->question}} 
                        </div>
                        <div class="back">
                            Answer: {{$singleFlashcard->answer}}
                            <div class="buttons" style="position:absolute;">
                                <a href="{{url('flashcards/singleflashcard/'.$singleFlashcard->single_flashcard_id.'/edit')}}" style=" !important; height: 40px; position:bottom;" class="btn float m-2">Edit</a>
                                <a href="{{url('flashcards/'.$singleFlashcard->single_flashcard_id.'/delete')}}" style="!important; height: 40px;" class="btn float m-2">Delete</a>
                            </div>
                            </p>
                        </div>
                    </x-single-flashcards>
                </div>
            @empty
                <h1 class="m-3">You have no flashcards for this group. Why dont you try creating some!</h1><br><br><br>
            @endforelse  
        </div>
    </div>
</x-app-layout>