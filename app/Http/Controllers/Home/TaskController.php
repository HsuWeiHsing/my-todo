<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
// use App\Models\User;

class TaskController extends Controller
{
    //
    public function create() {
        return view('post.create');
    }

    public function store(Request $request) {

        $task = new Task();
        $task->user_id = auth()->id();
        $task->task_name = $request->task_name;
        $task->content = $request->content;
        $task->deadline = $request->deadline;
        $task->category = $request->category;
        $task->task_status = $request->task_status;
        $task->severity_level = $request->severity_level;
        $task->importance_indication = $request->importance_indication;
        $task->save();

        return redirect('/dashboard');

    }

    public function index() {
        $tasks = Task::all();
        return view('dashboard', compact('tasks'));
    }
}