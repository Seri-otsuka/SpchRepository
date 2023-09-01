<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>BlogName</h1>
        <form action="/articles" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="article[title]" placeholder="タイトル" value="{{ old('article.title') }}" />
                <p class="title_error" style="color:red">{{ $errors->first('article.title') }}</p>
            </div>
            <div class="text">
                <h2>text</h2>
                <textarea name="article[text]" placeholder="今日もお疲れさまでした">{{ old('article.text') }}</textarea>
                <p class="text_error" style="color:red">{{ $errors->first('article.text') }}</p>
            </div>
            <input type="submit" value="store" />
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>