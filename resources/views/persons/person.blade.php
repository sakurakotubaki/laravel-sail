<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1>名簿管理アプリ</h1>
    <a href="{{ route('persons.create') }}">Add Person</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($persons as $person)
                <tr>
                    <td>{{ $person->name }}</td>
                    <td>{{ $person->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>