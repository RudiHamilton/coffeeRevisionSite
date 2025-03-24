<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Revision Task') }}
            <a style="!important;"class="btn float-end ml-2" href="{{route('revisiontimeline.index')}}"><-Back</a>
        </h2>
    </x-slot>
    <div class="card-body m-10">
        <h5 class="h5">Create your tasks to work on here. Remember it is always important to be organised :D</h5>
        <br>
        <form action="{{route('revisiontimeline.store')}}" method="POST">
            @csrf
            <!--subject input-->
            <div>
                <x-input-label for="name" :value="__('Subject')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div><br>
            <!--descriptions input-->
            <div>
                <x-input-label for="description" :value="__('Description')" />
                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="description" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div><br>

            <x-input-label for="name" :value="__('Select date and time you will START working on this')" />
            <input name="start_time" class="w-100 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="datetime-local" required><br><br>
            <x-input-label for="name" :value="__('Select date and time you will FINISH working on this')" />
            <input name="finish_time" class="w-100 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="datetime-local" required><br><br>

            <div class="mt-3">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>
</x-app-layout>