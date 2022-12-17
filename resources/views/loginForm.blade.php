@extends('layout')

@section('content')
    <div class="flex justify-center mt-20">

        <form action="{{ route('loginHandler') }}" method="POST" class="flex flex-col w-96 gap-3">
            @csrf
            <input class="input input-bordered @error('email') input-error @enderror" type="text" name="email" placeholder="E-mail">
            <input class="input input-bordered @error('password') input-error @enderror" type="password" name="password" placeholder="password">
            <button class="btm ">Login</button>
        </form>
    </div>
@endsection
