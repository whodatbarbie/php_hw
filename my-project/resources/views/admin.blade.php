<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button onclick="location.href='/add'">Add Post</button>

    <hr>
    
    <h1>Posts</h1>
    <ul>
    @foreach ($posts as $post)
        <li>{{ $post->title }} <a href='/comments/{{ $post->id }}'>Check Comments</a></li>
    @endforeach
    </ul>
</body>
</html>