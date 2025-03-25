<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Flashcards') }}
            <a  class="btn btn-primary float-end" href="{{ url(path: 'flashcards/groupflashcards/create')}}">Create Flashcard Group +</a>
        </h2>
    </x-slot>
    @forelse ($groupFlashcards as $groupFlashcard)
            <x-group-flashcards>
                <h4 class="h4 m-2">{{$groupFlashcard->name}}</h4> <br>
                <p class="m-2">
                {{$groupFlashcard->description}}<br>
                @if($groupFlashcard->visibility == true)
                    <p class="m-2">Public</p>
                @else
                    <p class="m-2">Private</p>
                @endif<br><br>
                <a href="{{url('flashcards/show/'.$groupFlashcard->group_flashcard_id)}}" style="!important; height: 40px;" class="btn float m-2">View</a>
                @if($groupFlashcard->user_flashcard_id == $userFlashcardId)
                    <a href="{{url('flashcards/groupflashcard/'.$groupFlashcard->group_flashcard_id.'/edit')}}" style="!important; height: 40px;" class="btn float m-2">Edit</a>
                @endif
                </p>
            </x-group-flashcards>
        </a>
    @empty
        <h2 class="m-5">You have no flashcard groups yet! Dont worry press the create button to get started.</h2>
    @endforelse
</x-app-layout>