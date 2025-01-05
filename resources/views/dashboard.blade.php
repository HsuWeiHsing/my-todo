<title>TODOリスト</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('タスク一覧') }}
        </h2>
        <div class="font-semibold text-sm text-red-500 leading-tight">
            {{ __("ログイン中です。") }}
        </div>
    </x-slot>
    <div class="mx-auto px-6">
        @foreach($tasks as $task)
          <div class="mt-4 p-8 bg-white w-full rounded-2xl">
            <h1 class="p-4 text-lg font-semibold">
                ■タスク名：
                  
                  {{ $task->task_name }}
                  </a>
            </h1>
            <p class="p-4 text-lg font-semibold">
                ☆カテゴリー：{{ $task->category}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                ☆ステータス：{{ $task->task_status}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                ☆緊急度：{{ $task->severity_level}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                ☆重要度：{{ $task->importance_indication}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                ☆デットライン：{{ $task->deadline}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </p>
            <hr class="w-full">
            <p class="mt-4 p-4">
                <br>
                {{ Str::limit($task->content, 130, '......') }}<br><br><br>
                <a href="{{route('post.show', $task)}}" class="text-blue-500">詳細内容を読む</a>
            </p>
            <hr class="w-full">
            <div class="p-4 text-sm font-semibold">
                <p>
                    ◎タスク作成時間：{{ $task->created_at }} / ◎作成者：{{ $task->user->name }}
                </p>
            </div>
          </div>
        @endforeach
    </div>
</x-app-layout>
