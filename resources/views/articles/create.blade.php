<x-app-layout>
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <title>Blog</title>
        </head>
        <body>
        　　<x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('記事を作る') }}
                </h2>
            </x-slot>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <form action="/articles" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="title">
                                    <x-input-label for="title" :value="__('タイトル')" />
                                    <x-text-input type="text" name="article[title]" placeholder="タイトル" class="mt-1 block w-full" value="{{ old('article.title') }}" />
                                    <p class="title_error" style="color:red">{{ $errors->first('article.title') }}</p>
                                </div>
                                <div class="text">
                                    <x-input-label for="title" :value="__('内容')" />
                                    <x-text-input type="text" name="article[text]" placeholder="ここに記事をかいてね！" value="{{ old('article.text') }}" />
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
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </html>
</x-app-layout>