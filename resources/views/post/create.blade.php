<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            フォーム
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        <form method="post" action="{{ route('post.store') }}" onsubmit="return confirmSubmit()">
            @csrf
            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <label for="title" class="font-semibold mt-4">タイトル</label>
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    <input type="text" name="title" class="w-auto py-2 border border-gray-300 rounded-md" id="title" value="{{old('title')}}">
                </div>
            </div>
            <div class="w-full flex flex-col">
                <label for="body" class="font-semibold mt-4">本文</label>
                <x-input-error :messages="$errors->get('body')" class="mt-2" />
                <textarea name="body" class="w-auto py-2 border border-gray-300 rounded-md" id="body" cols="30" rows="5">{{ old('body') }}</textarea>
            </div>
            <x-primary-button class="mt-4">
                投稿する
            </x-primary-button>
        </form>
    </div>

    <script>
        function confirmSubmit() {
            var confirmation = confirm("本当に保存しますか？");
            return confirmation;
        }
    </script>
</x-app-layout>
