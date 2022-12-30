<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Comments</h1>
    @foreach ($comments as $comment)

    <div>
        <h2>{{ $comment-> name }}</h2>
        <p>{{ $comment-> comment }}</p>

        <a href='/delete-comment/{{ $comment-> id }}'>Delete Comment</a>
    </div>
    @endforeach
</body>
</html>