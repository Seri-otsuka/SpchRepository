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
        <a href="login">ログイン</a>
        <a href="register">新規登録</a>
        <a href="/articles/create">記事を作る</a>
        <div class="articles">
           @foreach ($articles as $article)
           <div class='article'>
               <h2 class='title'>
                   <a href="/articles/{{ $article->id }}">{{ $article->title }}</a>
               </h2>
               <p class='text'>{{ $article->text }}</p>
           </div>
           @endforeach
        </div>
          <div class='paginate'>
            {{ $articles->links() }}
        </div>
        <a href="http://www.facebook.com/share.php?u={URL}" rel="nofollow noopener" target="_blank">リンクテキスト</a>
    </body>
</html>
