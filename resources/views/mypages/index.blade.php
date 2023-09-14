<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Mypage</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1>マイページ</h1>
        <p>ようこそ、{{ Auth::user()->name }}さん</p>
        <p><a href="{{ route('articles.index') }}">記事一覧へ</a></p>
        <form action="{{ route('logout') }}" method="post">
            @csrf 
            <button type="submit">ログアウト</button>
        </form>
    </body>
</html>
