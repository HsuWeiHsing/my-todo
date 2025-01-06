<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            詳細内容
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
      <div class="bg-white w-full rounded-2xl">
        <div class="mt-4 p-4">
          <h1 class="text-lg font-semibold">
            ■タスク名：{{ $task->task_name }}
          </h1>
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
          <br>   
          <p class="text-sm font-semibold flex flex-row-reverse">
            ★カテゴリー：{{ $task->category }}&nbsp;&nbsp;/ 
            &nbsp;&nbsp;★デットライン：{{ $task->deadline }}&nbsp;&nbsp;
          </p>
          <p class="text-sm font-semibold flex flex-row-reverse">
            /★ステータス：{{ $task->task_status }}&nbsp;&nbsp;/&nbsp;&nbsp;
            ★緊急度：{{ $task->severity_level }}&nbsp;&nbsp;/&nbsp;&nbsp;
            ★重要度：{{ $task->importance_indication }}
          <hr class="w-full">
          <p class="mt-4 whitespace-pre-line">
            {{ $task->content }}
          </p>
          <div class="text-sm font-semibold flex flex-row-reverse">
            <p> ・作成時間：{{ $task->created_at }} &nbsp;&nbsp;/&nbsp;&nbsp;
              ・更新時間：{{ $task->updated_at }}</p>
          </div>
        </div>
      </div>
    </div>
</x-app-layout>
