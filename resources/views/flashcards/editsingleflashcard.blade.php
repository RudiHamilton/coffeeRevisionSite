<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Single Flashcard') }}
            <a  class="btn btn-primary float-end" href="{{url('flashcards/show/'.$singleFlashcard->group_flashcard_id)}}">Back</a>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{url('flashcards/singleflashcard/'.$singleFlashcard->single_flashcard_id)}}" class="m-4" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$singleFlashcard->name}}" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div><br>

                    <div>
                        <x-input-label for="question" :value="__('Question')" />
                        <x-text-input id="question" class="block mt-1 w-full" type="text" name="question" value="{{$singleFlashcard->question}}" required autofocus autocomplete="question" />
                        <x-input-error :messages="$errors->get('question')" class="mt-2" />
                    </div><br>

                    <div>
                        <x-input-label for="answer" :value="__('Answer')" />
                        <x-text-input id="answer" class="block mt-1 w-full" type="text" name="answer" value="{{$singleFlashcard->answer}}" required autofocus autocomplete="answer" />
                        <x-input-error :messages="$errors->get('answer')" class="mt-2" />
                    </div><br>
                    
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>