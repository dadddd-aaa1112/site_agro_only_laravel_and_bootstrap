@extends('admin.layouts.main')
@section('content')
    <h3>Культуры</h3>
    <div class="mb-3">
       <a class="btn btn-outline-secondary" href="{{route('admin.culture.index')}}">На главную</a>
    </div>
    <form action="{{route('admin.culture.store')}}" method="post">
        @csrf
        @method('post')
        <div class="mb-3">
            <label class="form-label">Наименование</label>
            <input type="text" value="{{old('title')}}" name="title" class="form-control" placeholder="Наименование">
        @error('title')
            {{$message}}
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection
