<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class="antialiased">
        <h1>BlogName</h1>
        <div class="articles">
           @foreach ($articles as $article)
           <div class='post'>
               <h2 class='title'>{{ $article->title }}</h2>
               <p class='text'>{{ $article->text }}</p>
           </div>
           @endforeach
        </div>
          <div class='paginate'>
            {{ $articles->links() }}
        </div>
    </body>
</html>
