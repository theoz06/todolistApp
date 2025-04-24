<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index() {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request){
        $request -> validate(["title" => 'required']);
        Task::create(["title" => $request -> input("title")]);
        return redirect('/');
    }

    public function update($id){
        $task = Task::findOrFail($id);
        $task -> is_done = !$task -> is_done;
        $task -> save();
        return redirect('/');
    }

    public function delete($id){
        Task::destroy($id);
        return redirect('/');
    }
}
