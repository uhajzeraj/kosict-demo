<div class="container mx-auto mt-10">
    <x-flash-message />
   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <form class="mx-auto" wire:submit.prevent="register">
                            <input wire:model.lazy="newTodo" class="block w-full form-input" placeholder="Add a new todo">
                        </form>
                        @error('newTodo')
                            <div class="p-4 mt-2 text-white bg-red-400 rounded">{{ $message }}</div> 
                        @enderror
                    </div>
                    @forelse ($todos as $todo)
                        <div class="flex items-center justify-center mt-4 space-x-2 text-center">
                            <input wire:click="check({{ $todo['id'] }})" type="checkbox" class="form-checkbox" {{ $todo['is_finished'] ? 'checked': ''}}>
                            <span class="{{ $todo['is_finished'] ? 'line-through' : '' }}">{{ $todo['content'] }}</span>
                            <button wire:click="delete({{ $todo['id'] }})" type="button" class="px-1 ml-1 text-red-500 bg-transparent cursor-pointer focus:shadow-outline focus:outline-none">&cross;</button>
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
</div>
