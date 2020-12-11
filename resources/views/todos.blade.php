<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <form class="mx-auto" method="POST" action="/todos">
                            @csrf
                            <input name="content" class="block w-full form-input" placeholder="Add a new todo">
                        </form>
                        @error('newTodo')
                            <div class="p-4 mt-2 text-white bg-red-400 rounded">{{ $message }}</div> 
                        @enderror
                    </div>
                    @forelse ($todos as $todo)
                        <div class="flex items-center justify-center mt-4 space-x-2 text-center">
                            <input type="checkbox" class="form-checkbox" {{ $todo['is_finished'] ? 'checked': ''}} onchange="window.location.href = '/todos/{{$todo->id}}/check'">
                            <span class="{{ $todo['is_finished'] ? 'line-through' : '' }}">{{ $todo['content'] }}</span>
                            <a href="{{ "/todos/{$todo->id}/delete" }}" type="button" class="px-1 ml-1 text-red-500 bg-transparent cursor-pointer focus:shadow-outline focus:outline-none">&cross;</a>
                        </div>
                    @empty
                        <div class="mt-4 text-center">
                            Wow, such empty...
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
