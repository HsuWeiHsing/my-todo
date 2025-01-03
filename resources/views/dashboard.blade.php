<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('タスク一覧') }}
        </h2>
        <br>
        <div class="font-semibold text-sm text-red-500 leading-tight">
            {{ __("ログイン中です。") }}
        </div>
    </x-slot>

</x-app-layout>
