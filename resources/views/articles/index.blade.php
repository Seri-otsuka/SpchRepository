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
              <div class="m-5">
                <a href="/articles/create"><x-primary-button>＋記事を作る</x-primary-button></a>
            </div>

        @foreach ($articles as $article)
        <a href="{{ route('article.show', $article->id)}}">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">    
                        <div class="articles">
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
                           <div class='article'>
                                <div class="display: flex">
                                     <h2 class='text-2xl'>
                                       {{ $article->title }}
                                   </h2>
                                    <div class="ml-10 text-gray-400">
                                          投稿日：{{ $article->created_at }}
                                    </div>
                               </div>
                                <img class="object-contain rounded-lg aspect-auto w-20 h-20" src="{{ '/storage/articles/'. $article['image']}}"/>
                               <p class='text'>{!!nl2br($article->text)!!}</p>
                               <button class="inline-flex items-center rounded-full bg-pink-50 px-4 py-2 text-base font-medium text-pink-700 ring-1 ring-inset ring-pink-700/10 my-3">
                                   <a href="/categories/{{ $article->category->id }}">{{ $article->category->name }}</a>
                               </button>
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
                        </a>
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