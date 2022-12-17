@extends('layout')

@section('content')
    <div>
        <p class="text-3xl">Заявки клиентов</p>

        @include('components.sort')

        <table class="flex mt-5">

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
