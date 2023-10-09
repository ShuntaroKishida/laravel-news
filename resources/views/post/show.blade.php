<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          個別表示
      </h2>
  </x-slot>
  <div class="max-w-7xl mx-auto px-6">
      <div class="bg-white w-full rounded-2xl">
        <div class="mt-4 p-4">
          <h1 class="text-lg font-semibold">
            {{ $post->title }}
          </h1>
          <hr class="w-full">
          <p class="mt-4 whitespace-pre-line">
            {{$post->body}}
          </p>
        </div>
      </div>
  </div>
</x-app-layout>