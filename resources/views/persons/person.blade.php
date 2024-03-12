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
        <h1 class="text-3xl font-bold text-center my-8">名簿管理アプリ</h1>
        <div class="flex justify-end mb-4">
            <a href="{{ route('persons.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Person</a>
        </div>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">名前</th>
                        <th class="px-4 py-2">メールアドレス</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($persons as $person)
                        <tr class="{{ $loop->iteration % 2 === 0 ? 'bg-gray-200' : '' }}">
                            <td class="border px-4 py-2">{{ $person->name }}</td>
                            <td class="border px-4 py-2">{{ $person->email }}</td>
                            <td class="border px-4 py-2">
                                <button class="delete-button bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" data-id="{{ $person->id }}">削除</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        document.querySelectorAll('.delete-button').forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                if (confirm('本当に削除しますか？')) {
                    var id = this.getAttribute('data-id');
                    fetch('/persons/' + id, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }).then(function() {
                        window.location.href = '/persons';
                    });
                }
            });
        });
    </script>
</body>
</html>