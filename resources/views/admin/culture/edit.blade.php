@extends('admin.layouts.main')
@section('content')
    <div class="mb-3">
        <a class="btn btn-outline-secondary" href="{{route('admin.culture.index')}}">На главную</a>
    </div>
    <form action="{{route('admin.culture.update', $culture->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input name="title" type="text" value="{{$culture->title}}" class="form-control" placeholder="title">
            @error('title')
            {{$message}}
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection
