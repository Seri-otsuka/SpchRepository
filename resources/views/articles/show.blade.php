<x-app-layout>
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
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900"> 
                            @can('update', $article)
                            <div class="edit">
                                <a href="/articles/{{ $article->id }}/edit">編集</a>
                            </div>
                            @endcan
                            
                            <div class="article-info">
                                          投稿日：{{ $article->created_at }}｜投稿者：{{ $article->user->name }}
                                    </div>
                            <!--nullで入れてるのがあるからコードだけ書いてしまうとちっさいイラストだけ出る-->
                            <img src="{{ '/storage/articles/'. $article['image']}}"/>
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
                            <div class="article-control">
                            @if (!Auth::user()->is_good($article->id))
                            <form action="{{ route('good.store', $article) }}" method="post">
                                @csrf
                                <button>いいね</button>
                            </form>
                            @else
                            <form action="{{ route('good.destroy', $article) }}" method="post">
                                @csrf
                                @method('delete')
                                <button>いいね解除</button>
                            </form>
                            @endif
                        </div>
                            @can('delete', $article)
                            <form action="/articles/{{ $article->id }}" id="form_{{ $article->id }}" method="post">
                                       @csrf
                                       @method('DELETE')
                                       <button type="button" onclick="deleteArticle({{ $article->id }})">削除</button>
                                   </form>
                                   @endcan
                            <div class='footer'>
                                <a href="/article">戻る</a>
                            </div>
                             <script>
                                function deleteArticle(id){
                                    'use strict'
                                    
                                    if(confirm('削除すると復元できません。\n本当に削除しますか？')){
                                        document.getElementById(`form_${id}`).submit();
                                    }
                                }
                            </script>
                                <h2>コメント</h2>
                                    <ul>
                                        <li>
                                            <form method="POST" action="{{ route('comments.store',$article)}}">
                                                @csrf
                                                <input type="text" name="text" placeholder="コメント">
                                                <p class="text__error" style="color:red">{{ $errors->first('comment.text') }}</p>
                                                <button>コメントする</button>
                                            </form>
                                        </li>
                                    </ul>
                                    <ul>
                                        @foreach($article->comments()->latest()->get() as $comment)
                                        <li>
                                            投稿者：{{ $comment->user->name }}　投稿日：{{ $comment->created_at }}
                                            {{ $comment->text }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
        </body>
    </html>
</x-app-layout>