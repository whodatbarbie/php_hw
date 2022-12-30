<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
</head>
<body>
    <h1>{{ $post->title }}</h1>
    <hr>
    <p>{{ $post->post }}</p>
    <div>
    <form action="/comments/{{ $post->id }}" method="post">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment" required></textarea>
        </div>
        <button type="submit">Submit</button>
    </form>
    </div>
    <div>
        <h2>Comments:</h2>
        @foreach ($comments as $comment)
        <div>
            <h3>{{ $comment-> name }}</h3>
            <p>{{ $comment-> comment }}</p>
        </div>
        @endforeach
    </div>
</body>
</html>