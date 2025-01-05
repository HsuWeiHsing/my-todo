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

        $validated = $request->validate([
            'task_name' => 'required',
            'content' => 'required',
            'deadline' => 'required',
            'category' => 'required',
            'task_status' => 'required',
            'severity_level' => 'required',
            'importance_indication' => 'required',
        ]);
        
        // $task = Task::create($validated);

        $task = new Task();
        $task->user_id = auth()->id();
        $task->task_name = $validated['task_name'];
        $task->content = $validated['content'];
        $task->deadline = $validated['deadline'];
        $task->category = $validated['category'];
        $task->task_status = $validated['task_status'];
        $task->severity_level = $validated['severity_level'];
        $task->importance_indication = $validated['importance_indication'];
        $task->save();
        
        return back()->with('message', '保存しました。');

    }

    public function index() {
        $tasks = Task::all();
        return view('dashboard', compact('tasks'));
    }
}