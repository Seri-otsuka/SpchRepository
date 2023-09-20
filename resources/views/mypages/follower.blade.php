<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Mypage</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1 class="page-heading">フォローされている人</h1>
         <div class="articles">
           @foreach ($relationships as $relationship)
           <div class='relationship'>
                <div class="relationships-info">
                     <p>{{ $relationship->user->name}}</p>
                </div>
           </div>
           @endforeach
        </div>
    </body>
</html>