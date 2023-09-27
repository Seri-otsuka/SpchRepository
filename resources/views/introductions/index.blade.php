<x-app-layout>
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <title>サイトについて</title>
    
            <!-- Fonts -->
            <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        </head>
        <body class="antialiased">
              <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('サイトについて') }}
                    </h2>
                </x-slot>
                 <div align="right" class="m-5">
                <a href="/articles/create"><x-primary-button>＋記事を作る</x-primary-button></a>
            </div>
                  <div class="py-12">
                    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div align="center" class="p-6 text-gray-900">
                                 <p>こんにちは<br>
                                 　 このサイトはヲタクのために制作した推し布教アプリです！<br>
                                 　 推しの尊さを布教し、ヲタク仲間を増やしましょう！<br><br>
                                 　 以上　製作者からでした！</p>
                           </div>
                        </div>
                    </div>
                </div>
         </body>
     </html>
</x-app-layout>
