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
             <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('記事詳細') }}
                </h2>
            </x-slot>
              <div align="right" class="m-5">
                <a href="/articles/create"><x-primary-button>＋記事を作る</x-primary-button></a>
            </div>
            <div class="py-12">
                <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900"> 
                          <h1 class="text-2xl">
                                <div class="display: flex border-b-2 border-red-500">
                                <!--アイコン-->
                                 @if($article->user->profile_photo_path == null)
                                <img class="w-14 h-14 rounded-full object-cover border-none bg-gray-200" src="https://res.cloudinary.com/dlfimibcq/image/upload/v1695984855/aqeoyds9gl2qkhb5dtni.jpg">
                                @else
                                <img class="w-14 h-14 rounded-full object-cover border-none bg-gray-200" src="{{ $article->user->profile_photo_path }}">
                                @endif
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
                                  @if($article->image === null)
                                  @else 
                            <img class="object-contain rounded-lg my-3" src="{{ $article->image }}"/>
                                  @endif
                            </div>
                            <div class='content'>
                                <div class='content__article'>
                                    <p>{!!nl2br($article->text)!!}</p>
                                </div>
                                 <button class="inline-flex items-center rounded-full bg-pink-50 px-4 py-2 text-base font-medium text-pink-700 ring-1 ring-inset ring-pink-700/10 my-3">
                                <a href="/categories/{{ $article->category->id }}">{{ $article->category->name }}</a>
                                </button>
                            </div>
                            <!--いいねボタン-->
                            <div align="right" class="article-control mb-3">
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
                        <div align="right" class="flex justify-end">
                                @can('update', $article)
                                <div class="edit mx-3">
                                    <x-primary-button>
                                        <a href="/articles/{{ $article->id }}/edit">編集</a>
                                    </x-primary-button>
                                </div>
                                @endcan
                                   @can('delete', $article)
                               <form action="/articles/{{ $article->id }}" id="form_{{ $article->id }}" method="post">
                                   @csrf
                                   @method('DELETE')
                                   <x-primary-button type="button" onclick="deleteArticle({{ $article->id }})">削除</x-primary-button>
                               </form>
                               @endcan
                               </div>
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
        　　 <div class="py-1">
                <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <div class="text-base">コメント欄</div>
                                    @foreach($article->comments()->latest()->get() as $comment)
                                        <div class="display: flex border-b-2 border-gray-200 my-1">
                                              @if($comment->user->profile_photo_path == null)
                                                <img class="w-6 h-6 rounded-full object-cover border-none bg-gray-200" src="https://res.cloudinary.com/dlfimibcq/image/upload/v1695984855/aqeoyds9gl2qkhb5dtni.jpg">
                                                @else
                                             <img class="w-6 h-6 rounded-full object-cover border-none bg-gray-400 mx-3" src="{{ $comment->user->profile_photo_path }}">
                                                @endif
                                        <a href="/users/{{ $comment->user->id }}">{{ $comment->user->name }}</a>・{{ $comment->created_at }}
                                        </div>
                                       <div class="mx-4">
                                           {{ $comment->text }}
                                       </div>
                                        @endforeach
                                        <form method="POST" action="{{ route('comments.store',$article)}}">
                                            @csrf
                                            <input class="w-96 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm my-3 mx-3" type="text" name="text" placeholder="コメント">
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
                                