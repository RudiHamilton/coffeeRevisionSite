<x-app-layout>
    <x-slot name="header">
        <div name="header" class="row">
            <div class="col"> <h2 class="mt-2 *:font-semibold text-xl text-gray-800 leading-tight">{{ __('Search Flashcards') }}</h2></div>
            <div class="col">
                <form action="{{route('search')}}" method="GET">
                    @csrf
                    <x-search-input id="search" class="block mt-1 w-full" type="text" name="search" :value="old('name')" required autofocus autocomplete="name"/> 
                </form>
            </div>
        </div>
    </x-slot>
    <div class="card-body">
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
                    @if($groupFlashcard->user_flashcard_id == $findingActiveUserFlashcardId)
                        <a href="{{url('flashcards/groupflashcard/'.$groupFlashcard->group_flashcard_id.'/edit')}}" style="!important; height: 40px;" class="btn float m-2">Edit</a>
                    @endif
                </p>
                </x-group-flashcards>
            </a>
        @empty
        <div class="card-body" style=" display: flex;">
            <div style="flex:3;"><h2 class="h5 m-5">Sorry we couldnt find any flashcards based on your search why dont you try making some!</h2></div>
            <div style="flex:1; margin-right:150px;"><a  class="btn btn-primary float-end m-5" href="{{ url(path: 'flashcards/groupflashcards/create')}}">Create Flashcard Group +</a></div>
        </div>
        @endforelse
    </div>
</x-app-layout>