@extends('layout')

@section('content')
    <div>
        <p class="text-3xl">Заявка № {{$proposal->id}}</p>

        <div class="grid grid-flow-col mt-5">

            @if(isset($proposal->image->filename))
                <div>
                    <img class="rounded-md" src="@if(@isset($proposal->image->filename)){{ Storage::url('image/thumbnail/'. $proposal->image->filename) }}
                                    @else
                                    {{ Storage::url('image/no_image.png') }}
                                    @endif"
                         alt="Image"/>
                </div>
            @endif
            <div>
                <div>Категория: {{$proposal->category->title}}</div>
                <div>Автор: {{$proposal->user->name}}</div>

                <div>Статус: @include('components.status')
                </div>
                <div>Дата: {{$proposal->created_at->format('d-m-Y')}}</div>

                <div>Текс: {{$proposal->text}}</div>
            </div>

        </div>
        <div class="mt-10">
        @forelse($proposal->comments as $comment)
            <div class="mt-2">
                @if($comment->user->role->title == 'Юрист')
                    <p>Ответ юриста</p>
                @else
                    <p>Ответ клиента</p>
                @endif
                <p>{{$comment->user->name}} : {{$comment->text}}</p>
            </div>
        @empty
        </div>
        @endforelse

        @if($proposal->status == 'inwork' && auth()->user()->role->title == 'Клиент')
            <form action="{{route('proposal.update', $proposal->id)}}" method="post" class="mt-20">
                @csrf @method('PUT')
                <input type="hidden" name="status" value="completed">

                <input type="hidden" name="user_id" value="{{auth()->id()}}">
                <input type="text" class="file-input file-input-bordered w-96" name="text">
                <button class="btn">Проблема решена</button>
            </form>
        @endif

        @if($proposal->status == 'new' && auth()->user()->role->title == 'Юрист')
            <form action="{{route('proposal.update', $proposal->id)}}" method="post" class="mt-20">
                @csrf @method('PUT')
                <input type="hidden" name="status" value="inwork">
                <input type="hidden" name="proposal_id" value="{{$proposal->id}}">
                <input type="hidden" name="user_id" value="{{auth()->id()}}">
                <input type="text" class="file-input file-input-bordered w-96" name="text">
                <button class="btn">Ответить клиенту</button>
            </form>
        @endif
    </div>
@endsection
