<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Mypage</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="user">
        <h1>{{ $user_name }}さんのページ</h1>
        </div>
        <div class="articles">
           @foreach ($articles as $article)
           <div class='article'>
                <div class="article-info">
                      投稿日：{{ $article->created_at }}｜投稿者：{{ $article->user->name }}
                </div>
               <h2 class='title'>
                   <a href="/articles/{{ $article->id }}">{{ $article->title }}</a>
               </h2>
               <p class='text'>{{ $article->text }}</p>
               <a href="/categories/{{ $article->category->id }}">{{ $article->category->name }}</a>
           </div>
           @endforeach
        </div>
          <div class='paginate'>
            {{ $articles->links() }}
        </div>
    </body>
</html>
