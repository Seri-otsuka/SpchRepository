<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>プロフィール作成</h1>
        <form action="/mypage" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="text">
                <h2>紹介文</h2>
                <input type="text" name="profile[text]" placeholder="自分のことを書いてみよう！" value="{{ old('profile.text') }}" />
                <p class="text_error" style="color:red">{{ $errors->first('profile.text') }}</p>
            </div>
             <div class="image">
                  <input type="file" name="icon" accept="image/png,image/jpeg,image/gif" />    
            </div>
            <input type="submit" value="投稿" />
        </form>
        <div class="footer">
            <a href="/article">戻る</a>
        </div>
    </body>
</html>