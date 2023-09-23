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
                    {{ $user_name }}
                </h2>
            </x-slot>
            <div class="user">
            </div>
            <div class="articles">
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