<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My-Project</title>
</head>
<body>
    <header></header>
    <div class='main-division'>
        <!-- for  i in this division create the next div-->
        @foreach ($posts as $post)
  
            <div class='post'>
                <h1>{{ $post->title }}</h1>
                <hr>
                <p>{{ $post->post }}</p>
                <div>Created at: {{ $post->created_at }}</div>
                <a href='/single-post/{{ $post->id }}'>Show More...</a>
            </div>
        @endforeach
    </div>
</body>
</html>