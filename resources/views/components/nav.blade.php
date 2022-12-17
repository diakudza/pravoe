<div class="flex justify-between">
    <div class="flex gap-3">
        <a href="/">Главная</a>
        @auth()
        <a href="{{route('proposal.index')}}">Лента заявок</a>
        @endauth
    </div>

    <div class="flex">

        @auth()
            <div class="flex flex-col">
                <a href="{{ route('logout') }}">{{auth()->user()->email}} </a>
                <p>Роль: {{ auth()->user()->role->title }}</p>
            </div>
        @endauth

        @guest()
            <a href="{{ route('login') }}">Вoйти</a>
        @endguest
    </div>
</div>

