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
          <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('記事一覧') }}
            </h2>
        </x-slot>
        <a href="/articles/create">記事を作る</a>
        <a href="/introductions">サイトについて</a>
        <a href="{{ route('mypage') }}">マイページ</a>
    
    @foreach ($articles as $article)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">    
                    <div class="articles">
                       <div class='article'>
                             <h2 class='title'>
                               <a href="{{ route('article.show', $article->id)}}">{{ $article->title }}</a>
                           </h2>
                            <div class="article-info">
                                  投稿日：{{ $article->created_at }}｜投稿者：<a href="/users/{{ $article->user->id }}">{{ $article->user->name }}</a>
                                  <div class="user-control">
                                    @if (!Auth::user()->is_relationship($article->user_id))
                                    <form action="{{ route('relationship.store', $article->user) }}" method="post">
                                        @csrf
                                        <x-primary-button>フォロー</x-primary-button>
                                    </form>
                                    @else
                                    <form action="{{ route('relationship.destroy', $article->user) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <x-primary-button>フォロー解除</x-primary-button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                           <p class='text'>{{ $article->text }}</p>
                           <a href="/categories/{{ $article->category->id }}">{{ $article->category->name }}</a>
                           @can('delete', $article)
                           <form action="/articles/{{ $article->id }}" id="form_{{ $article->id }}" method="post">
                               @csrf
                               @method('DELETE')
                               <x-primary-button type="button" onclick="deleteArticle({{ $article->id }})">削除</x-primary-button>
                           </form>
                           @endcan
                       </div>
                 </div>
            </div>
        </div>
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
