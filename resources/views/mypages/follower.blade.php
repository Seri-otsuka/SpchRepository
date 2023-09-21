<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Mypage</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1 class="page-heading">フォロワー</h1>
         <div class="articles">
           @foreach ($users as $user)
           <div class="user_name">
               {{ $user->name }}
           </div>
           @endforeach
        </div>
    </body>
</html>