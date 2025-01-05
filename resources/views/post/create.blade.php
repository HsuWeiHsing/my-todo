<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            フォーム
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
      @if(session('message'))
          <div class="text-red-600 font-bold">
              {{ session('message') }}
          </div>
      @endif
      
      <form action="{{ route('store') }}" method="POST">
        @csrf
        <div class="mt-8">
          <div class="w-full flex flex-col">
            <label for="task_name" class="font-semibold mt-4">タスク名</label>
            <x-input-error :messages="$errors->get('task_name')" class="mt-2" />
            <input type="text" name="task_name" class="w-auto py-2 boder boder-gray-300 rounded-md" id="task_name"
            value="{{ old('task_name') }}">
          </div>
        </div>

        <div class="w-full flex flex-col">
          <label for="content" class="font-semibold mt-4">タスク詳細内容</label>
          <x-input-error :messages="$errors->get('content')" class="mt-2" />
          <textarea name="content" class="w-auto py-2 boder boder-gray-300 rounded-md" id="content" cols="30" rows="5">   
            {{ old('content') }}
          </textarea>
        </div>

        <div class="mt-8">
          <div class="w-full flex flex-col">
            <label for="deadline" class="font-semibold mt-4">完成期限日</label>
            <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
            <input type="text" name="deadline" class="w-auto py-2 boder boder-gray-300 rounded-md" id="deadline" 
            value="{{ old('deadline') }}">
          </div>
        </div>

        <div class="mt-8">
          <div class="w-full flex flex-col">
            <label for="category" class="font-semibold mt-4">カテゴリー(勉強、運動など。)</label>
            <x-input-error :messages="$errors->get('category')" class="mt-2" />
            <input type="text" name="category" class="w-auto py-2 boder boder-gray-300 rounded-md" id="category"
            value="{{ old('category') }}">
          </div>
        </div>

        <div class="mt-8">
          <div class="w-full flex flex-col">
            <label for="task_status" class="font-semibold mt-4">タスクステータス（着手中、完了、未着手、着手予定）
            </label>
            <x-input-error :messages="$errors->get('task_status')" class="mt-2" />
            <input type="text" name="task_status" class="w-auto py-2 boder boder-gray-300 rounded-md" id="task_status"
            value="{{ old('task_status') }}">
          </div>
        </div>

        <div class="mt-8">
          <div class="w-full flex flex-col">
            <label for="severity_level" class="font-semibold mt-4">緊急度(高、中、低)</label>
            <x-input-error :messages="$errors->get('severity_level')" class="mt-2" />
            <input type="text" name="severity_level" class="w-auto py-2 boder boder-gray-300 rounded-md" id="severity_level"
            value="{{ old('severity_level') }}">
          </div>
        </div>

        <div class="mt-8">
          <div class="w-full flex flex-col">
            <label for="importance_indication" class="font-semibold mt-4">重要度(高、中、低)</label>
            <x-input-error :messages="$errors->get('importance_indication')" class="mt-2" />
            <input type="text" name="importance_indication" class="w-auto py-2 boder boder-gray-300 rounded-md" id="importance_indication" value="{{ old('importance_indication') }}">
          </div>
        </div>
        
        <x-primary-button class="mt-4">
          送信する
        </x-primary-button>
      </form>
    </div>
</x-app-layout>
