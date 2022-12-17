<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>

    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<main>

    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

        @include('components.nav')

        <div class="px-4 py-6 sm:px-0">

            @yield('content')

        </div>

        @include('components.alert')
    </div>

</main>

</body>
</html>
