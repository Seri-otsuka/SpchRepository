<x-app-layout>
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <title>Blog</title>
    
            <!-- Fonts -->
            <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        </head>
        <body class="antialiased">
            <h1>記事一覧</h1>
            <a href="/articles/create">記事を作る</a>
            <div class="articles">
               @foreach ($articles as $article)
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                           <div class='article'>
                               <p class='create'>投稿日：{{ $article->created_at }}</p>投稿者：<a href="/users/{{ $article->user->id }}">{{ $article->user->name }}</a>
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
                        </dvi>
                    </div>
                </dvi>
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
</x-app-layout>
