<x-app-layout>
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <title>Mypage</title>
    
            <!-- Fonts -->
            <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        </head>
        <body>
          <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('マイページ') }}
                </h2>
            </x-slot>
            <div class="py-10">
                <div class="max-w-5xl mb-1 mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h1 class="text-2xl">
                             <div class="display: flex">
                              <img class="w-16 h-16 rounded-full object-cover border-none bg-gray-200" src="{{ isset(Auth::user()->profile_photo_path) ? asset('storage/' . Auth::user()->profile_photo_path) : asset('images/user_icon.png') }}">
                              <div class="m-4">
                                 {{ Auth::user()->name }}
                               </div>
                             </div>
                        </h2>
                            <p>{{ Auth::user()->text }}</p>
    
                            <a href="{{ route('goods') }}"><x-primary-button>いいねした記事</x-primary-button></a>
                            <!--フォロー機能のテーブルからデータを取得して一覧を見れるようにしたい-->
                            <a href="{{ route('follows') }}"><x-primary-button>フォロー中</x-primary-button></a>
                            <a href="{{ route('followers') }}"><x-primary-button>フォロワー</x-primary-button></a>
                        </div>
                    </div>
                </div>
            </div>
               @foreach ($articles as $article)
                <a href="{{ route('article.show', $article->id)}}">
        <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
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
                                </div>
                            </h2>
                           <div class='article'>
                                 <div class="flex justify-between">
                                 <h1 class='title text-2xl ml-5'>
                                    {{ $article->title }}
                                </h1>
                                 <div class="ml-10 text-gray-400 text-right">
                                              投稿日：{{ $article->created_at }}
                                </div>
                            </div>
                                <div class="flex justify-between m-4 text-lg">
                                    <p class='text'>{!!nl2br($article->text)!!}</p>
                                    <div align="right">
                                        <img class="object-contain rounded-lg aspect-auto w-60 h-30" src="{{ '/storage/articles/'. $article['image']}}"/>
                                    </div>
                                </div>
                               <button class="inline-flex items-center rounded-full bg-pink-50 px-4 py-2 text-base font-medium text-pink-700 ring-1 ring-inset ring-pink-700/10 my-3">
                                   <a href="/categories/{{ $article->category->id }}">{{ $article->category->name }}</a>
                               </button>
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
