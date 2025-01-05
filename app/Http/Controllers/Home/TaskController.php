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
            'task_name' => 'required | max:50',
            'content' => 'required | max:200',
            'deadline' => 'required',
            'category' => 'required | max:50',
            'task_status' => 'required',
            'severity_level' => 'required',
            'importance_indication' => 'required',
        ],
        [
            'task_name.required' => 'タスク名は必ず入力してください。',
            'content.required' => '詳細内容は必ず入力してください。',
            'deadline.required' => '完成期限日は必ず入力してください。',
            'category.required' => 'カテゴリーは必ず入力してください。',
            'task_status.required' => 'ステータスは必ず入力してください。',
            'severity_level.required' => '緊急度は必ず入力してください。',
            'importance_indication.required' => '重要度は必ず入力してください。'
        ]);
        
        $validated['user_id'] = auth()->id();

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
        $tasks = Task::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
        return view('dashboard', compact('tasks'));
    }
}   