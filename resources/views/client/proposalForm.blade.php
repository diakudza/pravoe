@extends('layout')

@section('content')
    <div class="flex flex-col  items-center">
        <p class="text-3xl">Составьте Вашу заявку</p>

        <form action="{{ route('proposal.store') }}" method="POST" enctype="multipart/form-data"
              class="mt-5 flex flex-col gap-3 w-[70%]">
            @csrf

            <input type="hidden" class="input" name="user_id" value="{{ auth()->id()}}">
            <select class="select select-bordered @error('category_id') select-error @enderror"
                    name="category_id">
                <option disabled checked="">Выберете категорию</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @checked(old('category_id'))>{{ $category->title }}</option>
                @endforeach
            </select>

            <input type="file" class="file-input file-input-bordered w-full " name="filename" value="{{ @old("filename")}}" placeholder="">
            <textarea class="textarea textarea-bordered" rows="15" name="text" placeholder="Текст заявки">{{old('text')}}</textarea>
            <button class="btn ">Отправить</button>
        </form>
    </div>
@endsection
