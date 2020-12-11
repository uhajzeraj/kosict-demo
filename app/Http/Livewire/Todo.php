<?php

namespace App\Http\Livewire;

use App\Models\Todo as TodoModel;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Todo extends Component
{
    public $todos;

    public $newTodo;

    public function mount()
    {
        $this->todos = TodoModel::latest()
            ->get(['id', 'content', 'is_finished'])
            ->keyBy('id')
            ->toArray();
    }

    public function render()
    {
        return view('livewire.todo');
    }

    public function register()
    {
        $todo = TodoModel::create([
            'content' => $this->newTodo,
            'is_finished' => false,
        ]);

        $this->todos[$todo->id] = $todo->only('id', 'content', 'is_finished');

        $this->dispatchBrowserEvent('flash', 'Item added');

        $this->reset('newTodo');
    }

    public function delete($id)
    {
        TodoModel::whereId($id)->delete();

        unset($this->todos[$id]);

        $this->dispatchBrowserEvent('flash', 'Item deleted');
    }

    public function check($id)
    {
        TodoModel::whereId($id)
            ->update(['is_finished' => DB::raw('NOT is_finished')]);

        $this->todos[$id]['is_finished'] = !$this->todos[$id]['is_finished'];

        $this->dispatchBrowserEvent('flash', 'Status changed');
    }
}
