<x-app-layout>
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <title>Mypage</title>
    
            <!-- Fonts -->
            <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        </head>
        <body>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('フォロワー') }}
                </h2>
            </x-slot>
             <div class="articles">
               @foreach ($users as $user)
                <div class="py-5">
                    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900"> 
                            <h1 class="text-xl">
                            <div class="display: flex">
                                 @if($user->profile_photo_path == null)
                                <img class="w-10 h-10 rounded-full object-cover border-none bg-gray-200" src="https://res.cloudinary.com/dlfimibcq/image/upload/v1695984855/aqeoyds9gl2qkhb5dtni.jpg">
                                 @else
                                <img class="w-10 h-10 rounded-full object-cover border-none bg-gray-200 mx-3" src="{{ $user->profile_photo_path }}">
                                @endif
                               <div class="user_name mx-3 my-2">
                                   <a href="/users/{{ $user->id }}">
                                   {{ $user->name }}
                                   </a>
                               </div>
                            </div>
                        </h2>
                            </div>
                        </div>
                    </div>
                </div>
               @endforeach
            </div>
        </body>
    </html>
</x-app-layout>