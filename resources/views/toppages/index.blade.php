<x-guest-layout>
    <!-- Session Status -->
    <div class="flex justify-center">
    <h1>すぷちゃへようこそ！</h1>
    </div>
    <div class="flex justify-center">
         @if (Route::has('login'))
                    @auth
                        <a href="{{ route('mypage') }}" class="inline-flex items-center rounded-full bg-pink-50 px-4 py-2 text-base font-medium text-pink-700 ring-1 ring-inset ring-pink-700/10 my-3 mx-3">マイページへ</a>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center rounded-full bg-pink-50 px-4 py-2 text-base font-medium text-pink-700 ring-1 ring-inset ring-pink-700/10 my-3 mx-3">ログイン</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="inline-flex items-center rounded-full bg-pink-50 px-4 py-2 text-base font-medium text-pink-700 ring-1 ring-inset ring-pink-700/10 my-3 mx-3">新規登録</a>
                        @endif
                    @endauth
                </div>
            @endif
    </div>
</x-guest-layout>