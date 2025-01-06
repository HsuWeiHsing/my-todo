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
            'content' => 'required | max:100000',
            'deadline' => 'required | max:50',
            'category' => 'required | max:50',
            'task_status' => 'required',
            'severity_level' => 'required',
            'importance_indication' => 'required',
        ],
        [
            'task_name.required' => 'タスク名は必ず入力してください。',
            'content.required' => '詳細内容は必ず入力してください。',
            'deadline.required' => '一番右のカレンダーマークをクリックし、期限日の選択してください。',
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

    public function show($id) {
        $task = Task::find($id);
        return view('post.show', compact('task'));
    }

    public function edit($id) {
        $task = Task::find($id);
        return view('post.edit', compact('task'));
    }
    
    public function update(Request $request, $id) {

        $validated = $request->validate([
            'task_name' => 'required | max:50',
            'content' => 'required | max:100000',
            'deadline' => 'required | max:50',
            'category' => 'required | max:50',
            'task_status' => 'required',
            'severity_level' => 'required',
            'importance_indication' => 'required',
        ],
        [
            'task_name.required' => 'タスク名は必ず入力してください。',
            'content.required' => '詳細内容は必ず入力してください。',
            'deadline.required' => '一番右のカレンダーマークをクリックし、期限日の選択してください。',
            'category.required' => 'カテゴリーは必ず入力してください。',
            'task_status.required' => 'ステータスは必ず入力してください。',
            'severity_level.required' => '緊急度は必ず入力してください。',
            'importance_indication.required' => '重要度は必ず入力してください。'
        ]);
        
        $validated['user_id'] = auth()->id();
        // $task->user_id = auth()->id();
        $task = Task::find($id);
        $task->user_id = auth()->id();
        $task->task_name = $validated['task_name'];
        $task->content = $validated['content'];
        $task->deadline = $validated['deadline'];
        $task->category = $validated['category'];
        $task->task_status = $validated['task_status'];
        $task->severity_level = $validated['severity_level'];
        $task->importance_indication = $validated['importance_indication'];
        $task->update($validated);
        return back()->with('message', '更新しました。');
    }
    
    public function destroy ($id) {
        $task = Task::find($id);
        $task->delete();
        return redirect('dashboard')->with('message', '削除しました');
    }

}   