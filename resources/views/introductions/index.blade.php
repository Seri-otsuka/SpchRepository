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
             <body class="antialiased">
              <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('サイトについて') }}
                    </h2>
                </x-slot>
            <a href="login">ログイン</a>
            <a href="register">新規登録</a>
           <P>サイトについての紹介文</P>
        </body>
    </html>
</x-app-layout>
