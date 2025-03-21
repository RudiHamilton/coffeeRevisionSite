<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            You are viewing the flashcard group: {{ __($groupFlashcardName) }}
            <a  style="margin-left: 10px;"class="btn btn-dark float-end"  href="{{ url(path: 'flashcards/singleflashcards/create')}}">Create Single Flashcard +</a>
            <a  style="margin-left:5px"class="btn btn-dark float-end" href="{{ url('flashcards')}}">Back</a>
        </h2>
        
    </x-slot>
    <div class="card-body m-5">

        @forelse ($singleFlashcards as $singleFlashcard)
            <x-single-flashcards>
                <p class="m-2">
                <h4 class="h4">{{$singleFlashcard->name}}</h4><br>
                Question: {{$singleFlashcard->question}} <br><br>
                Answer: {{$singleFlashcard->answer}} <br><br>
                </p>
            </x-single-flashcards>
        @empty
            <h1 class="m-3">You have no flashcards for this group. Why dont you try creating some!</h1><br><br><br>
        @endforelse  
    </div>
</x-app-layout>