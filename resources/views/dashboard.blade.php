<title>TODOリスト</title>
<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-left text-2xl text-gray-800 leading-tight">
            {{ __('タスク一覧') }}
        </h1>
        <div class="font-semibold text-sm text-red-500 leading-tight">
            {{ __("ログイン中です。") }}
        </div>
    </x-slot>
    <div class="mx-auto px-6">
        @if(session('message'))
            <div class="text-red-600 font-bold">
                {{ session('message')}}
            </div>
        @endif
        @foreach($tasks as $task)
        <div class="mt-4 p-8 bg-white w-full rounded-2xl">
            <h1 class="text-left p-4 text-lg font-semibold">
                ■タスク名：{{ $task->task_name }}
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
            <br>{{ Str::limit($task->content, 70, '......') }}<br><br><br>
            <a href="{{route('post.show', $task)}}" class="text-blue-500">詳細内容を読む</a>
            </p>
            <hr class="w-full">
            <div class="text-left p-4 text-sm font-semibold">
              <p>
                ◎作成時間：{{ $task->created_at }} 
              </p>
            </div>
            <div class="text-right flex">
                <a href="{{ route('edit', $task) }}" class="flex-1">
                    <x-primary-button>
                        内容編集
                    </x-primary-button>
                </a>
                <form method="post" action="{{ route('destroy', $task) }}" class="flex-2">
                    @csrf
                    @method('delete')
                    <x-primary-button class="bg-red-700 ml-2">
                        タスク削除
                    </x-primary-button>
                </form>
            </div>
        </div>
        @endforeach 
    </div>
    <div class="mb-4">
        {{ $tasks->links()}}
    </div>
</x-app-layout>
