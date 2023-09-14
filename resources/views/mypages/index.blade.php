<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Mypage</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1>マイページ</h1>
        <p>ようこそ、{{ Auth::user()->name }}さん</p>
        <p><a href="/article">記事一覧へ</a></p>
        <a href="{{ route('goods') }}">いいねした記事</a>
        <form action="{{ route('logout') }}" method="post">
            @csrf 
            <button type="submit">ログアウト</button>
        </form>
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
               @can('delete', $article)
               <form action="/articles/{{ $article->id }}" id="form_{{ $article->id }}" method="post">
                   @csrf
                   @method('DELETE')
                   <button type="button" onclick="deleteArticle({{ $article->id }})">削除</button>
               </form>
               @endcan
           </div>
           @endforeach
        </div>
          <div class='paginate'>
            {{ $articles->links() }}
        </div>
        <script>
            function deleteArticle(id){
                'use strict'
                
                if(confirm('削除すると復元できません。\n本当に削除しますか？')){
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</html>
