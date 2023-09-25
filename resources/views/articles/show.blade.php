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
                <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900"> 
                          <h1 class="text-2xl">
                                <div class="display: flex border-b-2 border-red-500">
                                <!--アイコン-->
                                <img class="w-14 h-14 rounded-full object-cover border-none bg-gray-200" src="{{ isset($article->user->profile_photo_path) ? asset('storage/' . $article->user->profile_photo_path) : asset('images/user_icon.png') }}">
                                 <!--ユーザー名-->
                                 <div class="m-4">
                                     <a href="/users/{{ $article->user->id }}">{{ $article->user->name }}</a>
                                 </div>
                                  <div class="user-control m-3">
                                        @if (!Auth::user()->is_relationship($article->user_id))
                                        <form action="{{ route('relationship.store', $article->user) }}" method="post">
                                            @csrf
                                             <button class="'inline-flex items-center px-4 py-2 bg-lime-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-600 focus:bg-lime-600 active:bg-lime-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">フォロー<button>
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
                            </h2>
                            <div class="flex justify-between">
                                 <h1 class='title text-2xl ml-5'>
                                    {{ $article->title }}
                                </h1>
                                 <div class="ml-10 text-gray-400 text-right">
                                              投稿日：{{ $article->created_at }}
                                </div>
                            </div>
                            <!--nullで入れてるのがあるからコードだけ書いてしまうとちっさいイラストだけ出る-->
                            <div class="flex justify-center rounded-lg">
                            <img class="object-contain" src="{{ '/storage/articles/'. $article['image']}}"/>
                            </div>
                            <div class='content'>
                                <div class='content__article'>
                                    <p>{{ $article->text }}</p>
                                </div>
                                <a href="/categories/{{ $article->category->id }}">{{ $article->category->name }}</a>
                            </div>
                            <!--いいねボタン-->
                            <div align="right" class="article-control">
                            @if (!Auth::user()->is_good($article->id))
                            <form action="{{ route('good.store', $article) }}" method="post">
                                @csrf
                                <x-primary-button>♡いいねする</x-primary-button>
                            </form>
                            @else
                            <form action="{{ route('good.destroy', $article) }}" method="post">
                                @csrf
                                @method('delete')
                                <x-primary-button>♥いいね解除</x-primary-button>
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
                                   @can('update', $article)
                                <div class="edit">
                                    <a href="/articles/{{ $article->id }}/edit">編集</a>
                                </div>
                                @endcan
                             <script>
                                function deleteArticle(id){
                                    'use strict'
                                    
                                    if(confirm('削除すると復元できません。\n本当に削除しますか？')){
                                        document.getElementById(`form_${id}`).submit();
                                    }
                                }
                            </script>
                         </div>
                    </div>
                 </div>
            </div>
        　　 <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">               
                            <h2>コメント</h2>
                              <ul>
                                    @foreach($article->comments()->latest()->get() as $comment)
                                    <li>
                                        投稿者：{{ $comment->user->name }}　投稿日：{{ $comment->created_at }}
                                        {{ $comment->text }}
                                    </li>
                                    @endforeach
                                </ul>
                                <ul>
                                    <li>
                                        <form method="POST" action="{{ route('comments.store',$article)}}">
                                            @csrf
                                            <input class="'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="text" placeholder="コメント">
                                           <x-primary-button>コメントする</x-primary-button>
                                            </p>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        </body>
    </html>
</x-app-layout>
                                