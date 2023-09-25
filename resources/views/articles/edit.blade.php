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
                    {{ __('記事を編集する') }}
                </h2>
            </x-slot>
            <div class="py-12">
                <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <form action="/articles/{{ $article->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="title">
                                    <x-input-label for="title" :value="__('タイトル')" />
                                    <input class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" name="article[title]" placeholder="タイトル" value="{{ $article->title }}" />
                                    <p class="title_error" style="color:red">{{ $errors->first('article.title') }}</p>
                                </div>
                                <div class="text">
                                    <x-input-label for="title" :value="__('内容')" />
                                    <textarea class="mt-1 block w-full h-96 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="article[text]" placeholder="ここに記事を書いてね！">{{ $article->text }}</textarea>
                                    <p class="text_error" style="color:red">{{ $errors->first('article.text') }}</p>
                                </div>
                               
                                     <div align="right">
                                        <input class="mt-6 inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" type="submit" value="編集" />
                                     </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </html>
</x-app-layout>