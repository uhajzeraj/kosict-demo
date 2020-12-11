<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodosController
{
    public function index()
    {
        return view('todos', [
            'todos' => Todo::all(),
        ]);
    }

    public function store(Request $request)
    {
        Todo::create(['content' => $request->content]);

        return redirect()->back();
    }

    public function check($id)
    {
        Todo::where('id', $id)
            ->update(['is_finished' => DB::raw('NOT is_finished')]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        Todo::where('id', $id)->delete();

        return redirect()->back();
    }
}
