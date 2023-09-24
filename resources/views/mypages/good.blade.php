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
                    {{ __('いいねした記事') }}
                </h2>
            </x-slot>
             <div class="articles">
               @foreach ($articles as $article)
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                               <div class='article'>
                                    <img class="w-14 h-14 rounded-full object-cover border-none bg-gray-200" src="{{ isset($article->user->profile_photo_path) ? asset('storage/' . $article->user->profile_photo_path) : asset('images/user_icon.png') }}">
                                    <div class="article-info">
                                          投稿日：{{ $article->created_at }}｜投稿者：{{ $article->user->name }}
                                    </div>
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
                                   <h2 class='title'>
                                       <a href="/articles/{{ $article->id }}">{{ $article->title }}</a>
                                   </h2>
                                   <p class='text'>{{ $article->text }}</p>
                                   <a href="/categories/{{ $article->category->id }}">{{ $article->category->name }}</a>
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
        </body>
    </html>
</x-app-layout>