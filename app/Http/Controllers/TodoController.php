<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::get();

        return view('welcome', [
            'todos' => $todos
        ]);
    }

    public function addTodo()
    {
        $attributes =   request()->validate([
            'title' => 'required',
            'description' => 'nullable',


        ]);


        Todo::create($attributes);

        return redirect('/');
    }

    public function update(Todo $todo)
    {



        $todo->update(['is_done' => true]);

        return redirect('/');
    }


    public function delete(Todo $todo)
    {



        $todo->delete();

        return redirect('/');
    }
}
