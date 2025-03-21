<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Flashcards') }}
            <a  class="btn btn-primary float-end" href="{{ url(path: 'flashcards/groupflashcards/create')}}">Create Flashcard Group +</a>
        </h2>
    </x-slot>
    @forelse ($groupFlashcards as $groupFlashcard)
            <x-group-flashcards>
                <p class="m-2">
                <h4 class="h4">{{$groupFlashcard->name}}</h4> <br>
                {{$groupFlashcard->description}}<br><br><br>
                <a href="{{url('flashcards/show/'.$groupFlashcard->group_flashcard_id)}}" style="background-color: #2C3E50 !important; height: 40px;" class="btn btn-dark float m-2">View</a>
                <a href="{{url('flashcards/show/'.$groupFlashcard->group_flashcard_id)}}" style="background-color: #2C3E50 !important; height: 40px;" class="btn btn-dark float m-2">Edit</a>
                </p>
            </x-group-flashcards>
        </a>
    @empty
        <h2 class="m-5">You have no flashcard groups yet! Dont worry press the create button to get started.</h2>
    @endforelse
</x-app-layout>