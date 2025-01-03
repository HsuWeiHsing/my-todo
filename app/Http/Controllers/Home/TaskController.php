<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    //
    public function show()
    {
        $tasks = Task::all();
        return view('task')->with('tasks', $tasks);
    }

    public function create(Request $request)
    {
        $task = new Task(); //空データの作成
        $task->task_name = $request->task_name; //task_nameを入れる
    }
}