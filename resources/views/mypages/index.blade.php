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
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                              <img class="w-16 h-16 rounded-full object-cover border-none bg-gray-200" src="{{ isset(Auth::user()->profile_photo_path) ? asset('storage/' . Auth::user()->profile_photo_path) : asset('images/user_icon.png') }}">
                            <p>
                                {{ Auth::user()->name }}さん、お帰りなさい
                                {{ Auth::user()->text }}
                            </p>
    
                            <a href="{{ route('goods') }}"><x-primary-button>いいねした記事</x-primary-button></a>
                            <!--フォロー機能のテーブルからデータを取得して一覧を見れるようにしたい-->
                            <a href="{{ route('follows') }}"><x-primary-button>フォロー中</x-primary-button></a>
                            <a href="{{ route('followers') }}"><x-primary-button>フォロワー</x-primary-button></a>
                        </div>
                    </div>
                </div>
            </div>
            <h1>自分の記事</h1>
               @foreach ($articles as $article)
               <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                           <div class='article'>
                                <div class="article-info">
                                      投稿日：{{ $article->created_at }}｜投稿者：{{ $article->user->name }}
                                </div>
                               <h2 class='title'>
                                   <a href="/articles/{{ $article->id }}">{{ $article->title }}</a>
                               </h2>
                               <p class='text'>{{ $article->text }}</p>
                               <a href="/categories/{{ $article->category->id }}">{{ $article->category->name }}</a>
                               <div class="edit">
                                    <a href="/articles/{{ $article->id }}/edit">編集</a>
                                </div>
                                <div class="article-control">
                                @if (!Auth::user()->is_good($article->id))
                                <form action="{{ route('good.store', $article) }}" method="post">
                                    @csrf
                                     <x-primary-button>いいね</x-primary-button>
                                </form>
                                @else
                                <form action="{{ route('good.destroy', $article) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <x-primary-button>いいね解除</x-primary-button>
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
