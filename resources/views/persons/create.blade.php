<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold text-left my-8 text-stone-500">名簿を追加</h1>
        <button id="backToDashboard" class="bg-lime-500 hover:bg-lime-700 text-white font-bold py-2 px-4 rounded mb-5">ダッシュボードに戻る</button>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <form action="{{ route('persons.store') }}" method="post" class="space-y-4">
                @csrf
                <div class="flex flex-col border-b border-gray-200 py-2">
                    <label class="w-full text-gray-700 text-sm font-bold mb-2" for="name">名前</label>
                    <input class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="name" placeholder="名前" required>
                    @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col border-b border-gray-200 py-2">
                    <label class="w-full text-gray-700 text-sm font-bold mb-2" for="email">メールアドレス</label>
                    <input class="w-full shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" name="email" placeholder="メールアドレス" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                    @error('email')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center justify-between mt-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        追加
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    document.getElementById('backToDashboard').addEventListener('click', function() {
        window.location.href = '/persons'; // ダッシュボードのURLを適切に設定してください
    });
</script>
</html>