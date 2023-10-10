<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-grey-800 leading-tight">
            Laravel News
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        <form method="post" action="{{ route('post.store') }}" onsubmit="return confirmSubmit()">
            @csrf
            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <label for="title" class="font-semibold mt-4">タイトル</label>
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    <input type="text" name="title" class="w-auto py-2 border border-gray-300 rounded-md"
                        id="title" value="{{ old('title') }}">
                </div>
            </div>
            <div class="w-full flex flex-col">
                <label for="body" class="font-semibold mt-4">本文</label>
                <x-input-error :messages="$errors->get('body')" class="mt-2" />
                <textarea name="body" class="w-auto py-2 border border-gray-300 rounded-md" id="body" cols="30"
                    rows="5">{{ old('body') }}</textarea>
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

    <div class="mx-auto px-6">
        @foreach ($posts as $post)
            <div class="mt-4 p-8 bg-white w-full rounded-2xl">
                <h1 class="p-4 text-lg font-semibold">
                    <a href="{{ route('post.show', $post) }}" class="text-blue-600">
                        {{ $post->title }}
                    </a>
                </h1>
                <hr class="w-full">
                <p class="mt-4 p-4">
                    {{ $post->body }}
                </p>
                <!-- 投稿に関連したコメント一覧を表示 -->
                <h2 class="text-lg font-semibold mt-4">コメント一覧</h2>
                @foreach ($post->comments as $comment)
                    <div class="mt-2 p-2 bg-gray-100 rounded">
                        <strong>{{ $comment->name }}</strong>: {{ $comment->content }}
                        <form action="{{ route('comment.destroy', ['post' => $post, 'comment' => $comment]) }}"
                            method="post" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 ml-2">削除</button>
                        </form>
                    </div>
                @endforeach
                <!-- コメント投稿フォーム -->
                <div class="mt-4">
                    <form action="{{ route('comment.store', $post) }}" method="post">
                        @csrf
                        <div class="flex items-center">
                            <input type="text" name="name" placeholder="名前"
                                class="p-2 border border-gray-300 rounded">
                            <input type="text" name="content" placeholder="コメント"
                                class="p-2 border border-gray-300 rounded ml-2 flex-1">
                            <button type="submit" class="bg-blue-500 text-white rounded p-2 ml-2">コメント投稿</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
