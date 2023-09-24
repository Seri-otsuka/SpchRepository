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
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900"> 
                              <img class="w-14 h-14 rounded-full object-cover border-none bg-gray-200" src="{{ isset($user->profile_photo_path) ? asset('storage/' . $user->profile_photo_path) : asset('images/user_icon.png') }}">
                               <div class="user_name">
                                   {{ $user->name }}
                               </div>
                                 <div class="user-control m-3">
                                        @if (!Auth::user()->is_relationship($user))
                                        <form action="{{ route('relationship.store', $user) }}" method="post">
                                            @csrf
                                             <button class="'inline-flex items-center px-4 py-2 bg-lime-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-600 focus:bg-lime-600 active:bg-lime-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">フォロー<button>
                                        </form>
                                        @else
                                        <form action="{{ route('relationship.destroy', $user) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <x-primary-button>フォロー解除</x-primary-button>
                                        </form>
                                        @endif
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
               @endforeach
            </div>
        </body>
    </html>
</x-app-layout>