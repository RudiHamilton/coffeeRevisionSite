<x-app-layout>
    <link rel="stylesheet" href="{{asset('css/switchbutton.css')}}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Flashcard Group') }}
            <a  class="btn btn-primary float-end" href="{{ url(path: 'flashcards')}}">Back</a>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{route('storeGroup')}}" class="m-4" method="POST">
                    @csrf
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div><br>
                   
                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="description" />
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div><br>

                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <select name="category_id" id="category_id" class="select">
                            @foreach($categories as $category)
                                <option value="{{$category->category_id}}">{{$category->category}}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div><br>

                    <div>
                        <div><x-input-label for="visibility" :value="__('Visibility')" /></div>
                            <div class="parent">
                                <div><x-input-label for="visibility" :value="__('Private')" /></div>
                                <label class="switch">
                                    <input type='hidden' name='visibility' value='0' />
                                    <input type="checkbox" name="visibility" value="1">
                                    <span class="slider round"></span>
                                </label>
                                <div><x-input-label for="visibility" :value="__(key: 'Public')" /></div>
                            </div>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div><br>
                    </div>
                    <br>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>