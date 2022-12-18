@extends('layout')

@section('content')
    <div>
        <p class="text-3xl">Мои заявки</p>
        <div class="flex justify-between">
            <div>
                <a class="btn mt-5" href="{{route('proposal.index')}}">Мои заявки</a>
                <a class="btn mt-5" href="{{route('proposal.index', ['rand'=>1])}}">Случайные заявки</a>
            </div>
            <a class="btn mt-5" href="{{route('proposal.create')}}">Оставить заявку</a>
        </div>

        @include('components.sort')
        <table class="flex mt-5 w-full">

            <th>Номер</th>
            <th>Кат.</th>
            <th>Фио</th>
            <th>Текс</th>
            <th>Статус</th>
            <th>Дата</th>

            @forelse($proposals as $proposal)
                <tr>
                    <td class="w-10"><a href="{{route('proposal.show', $proposal->id)}}">{{$proposal->id}}</a></td>
                    <td class="w-40">{{$proposal->category->title}}</td>
                    <td>{{$proposal->user->name}}</td>
                    <td>{{$proposal->text}}</td>
                    <td>@include('components.status')</td>
                    <td>{{$proposal->created_at->format('d-m-Y')}}</td>
                </tr>
            @empty
                <p>Пока заявок не оставлено</p>
            @endforelse
        </table>

        {{ $proposals->links() }}
    </div>
@endsection
