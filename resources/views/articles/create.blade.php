<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>BlogName</h1>
        <form action="/articles" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="article[title]" placeholder="タイトル" value="{{ old('article.title') }}" />
                <p class="title_error" style="color:red">{{ $errors->first('article.title') }}</p>
            </div>
            <div class="text">
                <h2>text</h2>
                <textarea name="article[text]" placeholder="ここに記事を書いてね！">{{ old('article.text') }}</textarea>
                <p class="text_error" style="color:red">{{ $errors->first('article.text') }}</p>
            </div>
            <div class="category">
                <h2>Category</h2>
                <select name="article[category_id]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
             <div class="image">
                  <input type="file" name="image" accept="image/png,image/jpeg,image/gif" />    
            </div>
            <input type="submit" value="投稿" />
        </form>
        <div class="footer">
            <a href="/article">戻る</a>
        </div>
    </body>
</html>