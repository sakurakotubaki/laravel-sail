<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>名簿を追加</h1>
    <form action="{{ route('persons.store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="名前">
        <input type="email" name="email" placeholder="メールアドレス">
        <button type="submit">追加</button>
    </form>
</body>
</html>