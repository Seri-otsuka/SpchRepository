<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Article</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="edit">
            <a href="/articles/{{ $article->id }}/edit">編集</a>
        </div>
        
        <p class='create'>投稿日{{ $article->created_at }}</p>
        <h1 class='title'>
            {{ $article->title }}
        </h1>
        <div class='content'>
            <div class='content__article'>
                <h3>本文</h3>
                <p>{{ $article->text }}</p>
            </div>
            <a href="/categories/{{ $article->category->id }}">{{ $article->category->name }}</a>
        </div>
        <div class='footer'>
            <a href="/article">戻る</a>
        </div>
    </body>
</html>